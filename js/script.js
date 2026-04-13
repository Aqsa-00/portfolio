
const hamburger = document.querySelector('.hamburger');
const navItems = document.querySelector('.nav-items');

hamburger.addEventListener("click", () => {
    navItems.classList.toggle("active");

    const icon = hamburger.querySelector("i");
    icon.classList.toggle("fa-bars");
    icon.classList.toggle("fa-xmark");
});
document.querySelectorAll(".nav-links a").forEach(link => {
  link.addEventListener("click", () => {
    
    // close menu
    navItems.classList.remove("active");

    // reset icon
    const icon = hamburger.querySelector("i");
    icon.classList.add("fa-bars");
    icon.classList.remove("fa-xmark");
  });
});

// Open modal
function openModal(id) {
    document.getElementById(id).style.display = 'flex';
}

// Close modal
function closeModal(id) {
    document.getElementById(id).style.display = 'none';
}

// Register user
async function registerUser() {
    const username = document.getElementById('reg-username').value;
    const email    = document.getElementById('reg-email').value;
    const password = document.getElementById('reg-password').value;
    const message  = document.getElementById('reg-message');

    try {
       const response = await fetch('/portfolio/api/users/register.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ username, email, password, role: 'viewer' })
        });

        const data = await response.json();

        if (response.ok) {
            message.className = 'auth-message success';
            message.textContent = 'Account created successfully! Please login.';
            setTimeout(() => {
                closeModal('registerModal');
                openModal('loginModal');
            }, 1500);
        } else {
            message.className = 'auth-message error';
            message.textContent = data.error || 'Registration failed';
        }
    } catch (err) {
        message.className = 'auth-message error';
        message.textContent = 'Something went wrong. Try again.';
    }
}

// Login user
async function loginUser() {
    const email    = document.getElementById('login-email').value;
    const password = document.getElementById('login-password').value;
    const message  = document.getElementById('login-message');

    try {
        const response = await fetch('/portfolio/api/users/login.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ email, password })
        });

        const data = await response.json();

        if (response.ok) {
            message.className = 'auth-message success';
            message.textContent = `Welcome ${data.username}! (${data.role})`;
            
            // Store user info
            localStorage.setItem('user', JSON.stringify(data));

            setTimeout(() => {
                closeModal('loginModal');
                updateUIForLoggedInUser(data);
            }, 1000);
        } else {
            message.className = 'auth-message error';
            message.textContent = data.error || 'Login failed';
        }
    } catch (err) {
        message.className = 'auth-message error';
        message.textContent = 'Something went wrong. Try again.';
    }
}

function updateUIForLoggedInUser(user) {
    console.log("Logged in user data:", user); // Debugging line
    let buttonsHtml = `
        <span style="font-weight:600; color: var(--primary-dark);">Hi, ${user.username}!</span>
    `;

    const role = (user.role || '').toLowerCase().trim();
    if (role === 'admin' || role === 'editor') {
        buttonsHtml += `<button class="btn btn-secondary btn-small" onclick="openModal('addContentModal')">Add Content</button>`;
        buttonsHtml += `<button class="btn btn-primary btn-small" onclick="loadAdminDashboard('${role}')">Dashboard</button>`;
    }

    buttonsHtml += `<button class="btn btn-outline btn-small" onclick="logoutUser()">Logout</button>`;
    document.getElementById('auth-buttons').innerHTML = buttonsHtml;
}

// Add Content
async function addContent() {
    const title = document.getElementById('content-title').value;
    const description = document.getElementById('content-description').value;
    const message = document.getElementById('content-message');

    try {
        const response = await fetch('/portfolio/api/editor/create.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ title, description })
        });

        const data = await response.json();

        if (response.ok) {
            message.className = 'auth-message success';
            message.textContent = 'Content added successfully!';
            setTimeout(() => {
                closeModal('addContentModal');
                document.getElementById('content-title').value = '';
                document.getElementById('content-description').value = '';
                message.textContent = '';
            }, 1500);
        } else {
            message.className = 'auth-message error';
            message.textContent = data.error || 'Failed to add content';
        }
    } catch (err) {
        message.textContent = 'Error adding content.';
    }
}

// Dashboard Logic
let currentTab = 'content';
let userRole = 'viewer';

async function loadAdminDashboard(role) {
    userRole = role;
    openModal('adminDashboardModal');
    switchTab('content');
}

async function switchTab(tab) {
    currentTab = tab;
    const contentDiv = document.getElementById('dashboard-content');
    const userTabBtn = document.getElementById('user-tab-btn');
    
    // Update active tab buttons
    document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
    event.target.classList.add('active');

    contentDiv.innerHTML = '<p>Loading data...</p>';

    try {
        const endpoint = tab === 'users' ? '/portfolio/api/admin/users.php' : '/portfolio/api/admin/content.php';
        const response = await fetch(endpoint);
        const data = await response.json();

        if (tab === 'users') {
            renderUsers(data);
        } else {
            renderContent(data);
        }
    } catch (err) {
        contentDiv.innerHTML = '<p class="error">Failed to load dashboard data.</p>';
    }
}

function renderContent(items) {
    let html = `<table class="data-table">
        <thead><tr><th>Title</th><th>Author</th><th>Date</th><th>Actions</th></tr></thead>
        <tbody>`;
    
    items.forEach(item => {
        html += `<tr>
            <td>${item.title}</td>
            <td>${item.username}</td>
            <td>${new Date(item.created_at).toLocaleDateString()}</td>
            <td><button class="btn-small btn-delete" onclick="deleteContent(${item.id})">Delete</button></td>
        </tr>`;
    });
    
    html += '</tbody></table>';
    document.getElementById('dashboard-content').innerHTML = html;
}

function renderUsers(users) {
    if (userRole !== 'admin') {
        document.getElementById('dashboard-content').innerHTML = '<p>Access Denied: Only admins can view users.</p>';
        return;
    }

    let html = `<table class="data-table">
        <thead><tr><th>Username</th><th>Email</th><th>Role</th><th>Status</th></tr></thead>
        <tbody>`;
    
    users.forEach(user => {
        html += `<tr>
            <td>${user.username}</td>
            <td>${user.email}</td>
            <td><span class="role-badge">${user.role}</span></td>
            <td><span class="status-badge ${user.is_active ? 'status-active' : 'status-inactive'}">${user.is_active ? 'Active' : 'Inactive'}</span></td>
        </tr>`;
    });
    
    html += '</tbody></table>';
    document.getElementById('dashboard-content').innerHTML = html;
}

async function deleteContent(id) {
    if (!confirm('Are you sure you want to delete this content?')) return;

    const response = await fetch('/portfolio/api/editor/delete.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ id })
    });

    if (response.ok) {
        switchTab('content');
    } else {
        alert('Delete failed');
    }
}

// Logout user
async function logoutUser() {
    await fetch('/portfolio/api/users/logout.php', { method: 'POST' });
    localStorage.removeItem('user');
    location.reload();
}

// Initial session check
window.addEventListener('DOMContentLoaded', () => {
    const savedUser = localStorage.getItem('user');
    if (savedUser) {
        updateUIForLoggedInUser(JSON.parse(savedUser));
    }
});
