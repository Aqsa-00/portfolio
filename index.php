<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PortFolio Design</title>
    <link href="./css/style.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!-- Fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
</head>

<body>
    <header class="header">
        <div class="container nav-container">
            <div class="logo">
                <a href="#home">PortFolio<span>.</span></a>
            </div>
            <nav class="nav-items">
                <ul class="nav-links">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#skill">Skills</a></li>
                    <li><a href="#project">Project</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
                <div class="auth-buttons" id="auth-buttons">
                    <button class="btn btn-primary" onclick="openModal('registerModal')">Sign Up</button>
                    <button class="btn btn-secondary" onclick="openModal('loginModal')">Logn In</button>
                </div>
            </nav>
             <div class="hamburger" id="hamburger">
                    <i class="fa-solid fa-bars"></i>
                </div>
        </div>
    </header>

    <!-- Hero Section -->
    <main>
        <section class="hero" id="home">
            <div class="container">
                <div class="grid hero-grid">
                    <div class="hero-content">
                        <div class="hero-title">
                            <h1>Hi, I'm <span>Aqsa</span></h1>
                            <p>I design and develop modern, responsive websites that deliver seamless user experiences.
                                Focused on clean code and creative design, I build solutions that are both functional
                                and visually engaging.
                                Passionate about turning ideas into impactful digital products.</p>
                        </div>
                        <div class="hero-actions">
                            <a href="#project" class=" hero-btn hero-primary">View Project</a>
                            <a href="#contact" class=" hero-btn hero-secondary">Hire me</a>
                        </div>
                    </div>
                    <div class="hero-image">
                        <img src="images/girl.avif">
                    </div>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section class="about section" id="about">
            <div class="container">
                <div class="section-title">
                    <h2>About me</h2>
                    <div class="divider"></div>
                    <p>I’m a passionate web developer with 2 years of experience creating responsive and user-friendly
                        websites. I specialize in building modern web solutions using technologies like HTML, CSS,
                        JavaScript, and WordPress. I enjoy turning ideas into real, functional digital experiences.</p>
                </div>
            </div>
        </section>

        <!-- Skills Section -->
        <section class="skills section" id="skill">
            <div class="container">
                <div class="section-title">
                    <h2>Expertise & Skills</h2>
                    <div class="divider"></div>
                    <div class="skills-container">
                        <div class="skill">
                            <p>HTML</p>
                            <div class="bar">
                                <div class="fill html">90%</div>
                            </div>
                        </div>
                        <div class="skill">
                            <p>CSS</p>
                            <div class="bar">
                                <div class="fill css">85%</div>
                            </div>
                        </div>
                        <div class="skill">
                            <p>JavaScript</p>
                            <div class="bar">
                                <div class="fill js">80%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>

        <!-- Projects Section -->
        <section class="project section" id="project">
            <div class="container">
                    <div class="section-title">
                        <h2> Featured Projects</h2>
                        <div class="divider"></div>
                    </div>
                     <div class="grid project-grid">
                    <div class="project-card">
                        <div class="project-image">
                            <img src="images/projec1.png" alt="project">
                        </div>
                         <div class="project-info">
                            <div class="tech-tags">
                                <span class="tag">Smart IoT</span>
                                <span class="tag">Dashboard</span>
                                <span class="tag">Responsive</span>
                            </div>
                            <h3>AgroSense</h3>
                            <p>A sophisticated agricultural management platform featuring real-time data visualization
                                and intuitive resource tracking for modern farming.</p>
                                <a href="#">GitHub Code</a>
                         </div>
                    </div>
                    <!-- Card 2 -->
                     <div class="project-card">
                        <div class="project-image">
                            <img src="images/project2.png" alt="project">
                        </div>
                        <div class="project-info">
                            <div class="tech-tags">
                                <span class="tag">Clean UI</span>
                                <span class="tag">Figma-to-code</span>
                                <span class="tag">Conversion</span>
                            </div>
                            <h3>Nexgen Website</h3>
                             <p>A high-conversion corporate landing page featuring a "Next-Gen" aesthetic, smooth
                                scrolling, and a mobile-first responsive architecture.</p>
                                <a href="#">GitHub Code</a>
                        </div>
                     </div>
                     <!-- Card 3 -->
                       <div class="project-card">
                        <div class="project-image">
                            <img src="images/project3.png" alt="project">
                        </div>
                        <div class="project-info">
                            <div class="tech-tags">
                                <span class="tag">SaaS UI</span>
                                <span class="tag">Aesthetics</span>
                                <span class="tag">Interactivity</span>
                            </div>
                            <h3>AstroFlow Website</h3>
                            <p>An elegant, high-impact landing page for specialized SaaS products, focusing on seamless
                                user flows and premium interactive elements.</p>
                                <a href="#">GitHub Code</a>
                        </div>
                     </div>
                </div>
            </div>
        </section>
        <div class="contact section" id="contact">
            <div class="container">
                <div class="section-title">
                    <h2>Get In Touch</h2>
                    <div class="divider"></div>
                </div>
                <div class=" grid contact-grid">
                    <div class="contact-info">
                         <h3>Contact Information</h3>
                         <p>Feel free to reach out for collaborations or just a friendly hello!</p>
                         <div class="info-item">
                             <i class="fas fa-envelope"></i>
                             <a href="#">aqsa@gmail.com</a>
                         </div>
                           <div class="social-links">
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-github"></i></a>
                    </div>
                    </div>
                    <!-- Form -->
                     <form action="post" class="contact-form" onsubmit="event.preventDefault(); alert('Form Submitted! (Frontend demonstration)')">
                           <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" placeholder="Your Name " required>
                           </div>
                             <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="your email@emaple.com " required>
                           </div>
                           <div class="form-group">
                            <label for="message">Message</label>
                           <textarea id="message" rows="5" required placeholder="How can I help you?"></textarea>
                           </div>
                           <button class="btn btn-primary">Send Message</button>
                     </form>
                </div>
            </div>
        </div>
    </main>
    <!-- Footer section -->
     <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <p>&copy; 2026 Aqsa. All rights reserved.</p>
           <div class="footer-links">
             <a href="#"><i class="fab fa-linkedin"></i></a>
            <a href="#"><i class="fab fa-github"></i></a>
        </div>
            </div>
        </div>
     </footer>
     <!-- Register Modal -->
<div id="registerModal" style="display:none;" class="modal-overlay">
    <div class="modal-box">
        <h2>Create Account</h2>
        <div class="form-group">
            <label>Username</label>
            <input type="text" id="reg-username" placeholder="Your username">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" id="reg-email" placeholder="your@email.com">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" id="reg-password" placeholder="Your password">
        </div>
        <div id="reg-message" class="auth-message"></div>
        <button class="btn btn-primary" onclick="registerUser()">Sign Up</button>
        <button class="btn btn-secondary" onclick="closeModal('registerModal')">Cancel</button>
    </div>
</div>

<!-- Login Modal -->
<div id="loginModal" style="display:none;" class="modal-overlay">
    <div class="modal-box">
        <h2>Welcome Back</h2>
        <div class="form-group">
            <label>Email</label>
            <input type="email" id="login-email" placeholder="your@email.com">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" id="login-password" placeholder="Your password">
        </div>
        <div id="login-message" class="auth-message"></div>
        <button class="btn btn-primary" onclick="loginUser()">Login</button>
        <button class="btn btn-secondary" onclick="closeModal('loginModal')">Cancel</button>
    </div>
</div>

<!-- Add Content Modal -->
<div id="addContentModal" style="display:none;" class="modal-overlay">
    <div class="modal-box">
        <h2>Add New Content</h2>
        <div class="form-group">
            <label>Title</label>
            <input type="text" id="content-title" placeholder="Project or Post Title">
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea id="content-description" rows="4" placeholder="What is this about?"></textarea>
        </div>
        <div id="content-message" class="auth-message"></div>
        <button class="btn btn-primary" onclick="addContent()">Save Content</button>
        <button class="btn btn-secondary" onclick="closeModal('addContentModal')">Cancel</button>
    </div>
</div>

<!-- Admin Dashboard Modal -->
<div id="adminDashboardModal" style="display:none;" class="modal-overlay">
    <div class="modal-box large">
        <h2>Admin Dashboard</h2>
        <div class="dashboard-tabs">
            <div class="tab-btn active" onclick="switchTab('content')">Manage Content</div>
            <div id="user-tab-btn" class="tab-btn" onclick="switchTab('users')">Manage Users</div>
        </div>
        <div id="dashboard-content" class="dashboard-content">
            <!-- Data will be loaded here -->
            <p>Loading...</p>
        </div>
        <button class="btn btn-secondary" onclick="closeModal('adminDashboardModal')">Close Dashboard</button>
    </div>
</div>
    <script src="js/script.js"></script>
</body>
</html>