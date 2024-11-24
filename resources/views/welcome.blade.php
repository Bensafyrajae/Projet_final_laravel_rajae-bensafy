<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management </title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function animateNumbers() {
            const counters = document.querySelectorAll(".animate-number");
            const speed = 200; // The lower the value, the faster the animation

            counters.forEach(counter => {
                const updateCount = () => {
                    const target = +counter.getAttribute("data-target");
                    const count = +counter.innerText;
                    const increment = target / speed;

                    if (count < target) {
                        counter.innerText = Math.ceil(count + increment);
                        setTimeout(updateCount, 20);
                    } else {
                        counter.innerText = target;
                    }
                };

                counter.style.visibility = "visible"; // Make the counter visible once it starts animating
                updateCount();
            });
        }

        // Trigger animation when the section is in view
        const observer = new IntersectionObserver(
            (entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        animateNumbers();
                        observer.disconnect(); // Stop observing after animation starts
                    }
                });
            }, {
                threshold: 0.5
            } // Trigger when 50% of the section is visible
        );

        observer.observe(document.getElementById("stats-section"));
    </script>
    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in-up {
            animation: fadeInUp 1s ease-in-out;
        }

        /* Image animation */
        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .scale-in {
            animation: scaleIn 1s ease-in-out;
        }

        /* Keyframes for fade-in animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeIn 1s ease-in-out;
        }

        /* Keyframes for hover link effect */
        @keyframes hoverGrow {
            from {
                transform: scale(1);
            }

            to {
                transform: scale(1.05);
            }
        }

        .hover-grow:hover {
            animation: hoverGrow 0.3s ease-in-out forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeIn 1s ease-out;
        }
        @keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes zoomIn {
    from {
        opacity: 0;
        transform: scale(0.8);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

.animate-card {
    animation: fadeInUp 1s ease forwards;
}

.animate-icon {
    animation: zoomIn 0.8s ease forwards;
}

.animate-delay-1s {
    animation-delay: 0.5s;
}

.animate-delay-2s {
    animation-delay: 1s;
}

/* Responsive Design */
@media (min-width: 768px) {
    .md\:grid-cols-3 {
        grid-template-columns: repeat(3, 1fr);
    }
}
    </style>
</head>

<body class="bg-gray-700 text-white font-sans">
    <!-- Header -->
    <header class="flex justify-between items-center p-6 bg-gray-600">
        <div class="text-lg font-bold">
            Task <span class="text-[#90afc4]">Management</span>
        </div>
        <div class="flex justify-end gap-2"><button
                class="bg-[#90afc4] px-4 py-2 rounded-md text-white hover:bg-blue-300"><a href="{{ route('register') }}"
                    class="cta-button">Register</a></button>
            <button class="bg-[#90afc4] px-4 py-2 rounded-md text-white hover:bg-blue-300"> <a
                    href="{{ route('login') }}" class="cta-button">Log In</a></button>
        </div>
    </header>

    <!-- Hero Section -->
    <section class=" bg-gray-700 text-gray-100 font-sans text-center py-20 px-6">
        <!-- Title -->
        <h1 class="text-4xl md:text-6xl fade-in-up font-serif font-medium text-[#90afc4]">
            YOUR ULTIMATE TASK MANAGEMENT SOLUTION
        </h1>
        <!-- Subtitle -->
        <p class="text-gray-300 mt-6 fade-in-up text-lg md:text-xl max-w-3xl mx-auto">
            Discover a smarter way to manage your tasks with <span class="text-blue-500">Task Management.</span> Say
            goodbye to chaos and hello to
            productivity.
        </p>

        <!-- Content -->
        <div class="mt-16 flex flex-col md:flex-row items-center gap-12 px-6">
            <!-- Image -->
            <img src="https://via.placeholder.com/800x400" alt="Dashboard preview"
                class="w-full md:w-[45%] rounded-lg shadow-lg scale-in hover:scale-105 transition-transform duration-300">

            <!-- Text Description -->
            <div class="text-left">
                <p class="text-lg md:text-xl fade-in-up">
                    Organize and track the progress of your team's tasks in one place. Whether you're assigning new
                    tasks, reviewing ongoing work, or collaborating on shared goals, this dashboard has everything you
                    need to stay on track.
                </p>
                <a href="#"
                    class="mt-6 inline-block bg-[#90afc4] hover:bg-[#90afc4] text-white px-6 py-3 rounded-md shadow-lg text-lg font-medium transition-all duration-300 fade-in-up">
                    Get Started Now
                </a>
            </div>
        </div>
    </section>


    <!-- Features -->
    <section id="features" class="py-20 bg-gray-600 mb-6">
        <h2 class="text-center text-3xl font-bold fade-in text-white">We can help manage your work more efficiently</h2>
       
          <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12 max-w-6xl mx-auto">
              <!-- Task Organization -->
              <div
                  class="flex flex-col rounded-xl shadow-2xl px-8 py-7 bg-white items-center card animate-card">
                  <div class="p-4 w-16 bg-blue-300 rounded-full mb-4 flex justify-center items-center icon animate-icon">
                      <i class="fas fa-tasks text-black text-2xl"></i>
                  </div>
                  <h3 class="font-bold text-lg text-gray-800">Task Organization</h3>
                  <p class="text-gray-500 mt-2">
                      Easily create, organize, and prioritize tasks with our intuitive interface.
                  </p>
              </div>
      
              <!-- Deadline Reminders -->
              <div
                  class="flex flex-col rounded-xl shadow-2xl px-8 py-7 bg-white items-center card animate-card animate-delay-1s">
                  <div class="p-4 w-16 bg-blue-300 rounded-full mb-4 flex justify-center items-center icon animate-icon">
                      <i class="fas fa-bell text-white text-2xl"></i>
                  </div>
                  <h3 class="font-bold text-lg text-gray-800">Deadline Reminders</h3>
                  <p class="text-gray-500 mt-2">
                      Never miss a deadline again with customizations and notifications.
                  </p>
              </div>
      
              <!-- Collaborative Work -->
              <div
                  class="flex flex-col rounded-xl shadow-2xl px-8 py-7 bg-white items-center card animate-card animate-delay-2s">
                  <div class="p-4 w-16 bg-blue-300 rounded-full mb-4 flex justify-center items-center icon animate-icon">
                      <i class="fas fa-users text-white text-2xl"></i>
                  </div>
                  <h3 class="font-bold text-lg text-gray-800">Collaborative Work</h3>
                  <p class="text-gray-500 mt-2">
                      Collaborate seamlessly with your team members for shared success.
                  </p>
              </div>
          </div>
          <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12 max-w-6xl mx-auto">
            <!-- Progress Tracking -->
            <div class="flex flex-col rounded-xl shadow-2xl px-8 py-7 bg-white items-center  card animate-card animate">
                <div class="p-4 w-16 bg-blue-300 rounded-full mb-4 flex justify-center items-center icon animate-icon">
                    <i class="fas fa-chart-line text-white text-2xl"></i>
                </div>
                <h3 class="font-bold text-lg text-gray-800">Progress Tracking</h3>
                <p class="text-gray-500 mt-2">Monitor your progress and achievements with insightful analytics and reports.</p>
            </div>
        
            <!-- Task Templates -->
            <div class="flex flex-col rounded-xl shadow-2xl px-8 py-7 bg-white items-center  card animate-card animate animate-delay-1s">
                <div class="p-4 w-16 bg-blue-300 rounded-full mb-4 flex justify-center items-center icon animate-icon">
                    <i class="fas fa-file-alt text-white text-2xl"></i>
                </div>
                <h3 class="font-bold text-lg text-gray-800">Task Templates</h3>
                <p class="text-gray-500 mt-2">Save time by using pre-made templates for common tasks and projects.</p>
            </div>
        
            <!-- Cross-Platform Sync -->
            <div class="flex flex-col rounded-xl shadow-2xl px-8 py-7 bg-white items-center  card animate-card animate animate-delay-2s">
                <div class="p-4 w-16 bg-blue-300 rounded-full mb-4 flex justify-center items-center icon animate-icon">
                    <i class="fas fa-sync-alt text-white text-2xl"></i>
                </div>
                <h3 class="font-bold text-lg text-gray-800">Cross-Platform Sync</h3>
                <p class="text-gray-500 mt-2">Access your tasks from anywhere, on any device with real-time synchronization.</p>
            </div>
        </div>
      </section>
      

      
    
    </section>
  
    <section class="bg-gray-600 text-white py-12">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid gap-8 md:grid-cols-4 text-center">
                <!-- Statistic 1 -->
                <div>
                    <h3 class="text-4xl font-bold">15,000+</h3>
                    <p class="mt-2 text-sm">
                        Projects managed with YowManage, streamlining team workflows and achieving goals.
                    </p>
                </div>

                <!-- Statistic 2 -->
                <div>
                    <h3 class="text-4xl font-bold">1,300+</h3>
                    <p class="mt-2 text-sm">
                        Teams collaborating daily on YowManage, improving communication and efficiency across various
                        projects.
                    </p>
                </div>

                <!-- Statistic 3 -->
                <div>
                    <h3 class="text-4xl font-bold">150,000+</h3>
                    <p class="mt-2 text-sm">
                        Tasks completed with YowManage, helping teams stay on schedule and meet deadlines.
                    </p>
                </div>

                <!-- Statistic 4 -->
                <div>
                    <h3 class="text-4xl font-bold">95%</h3>
                    <p class="mt-2 text-sm">
                        User satisfaction with YowManage, reflecting improved project efficiency and teamwork.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing -->
    <section class="font-sans py-20">
      <div class="max-w-7xl mx-auto py-12 px-6">
          <h2 class="text-4xl font-bold text-center text-white mb-6">Key features to boost your productivity</h2>
          <p class="text-center text-gray-200 mb-12">
              Explore the essential tools designed to streamline your workflow, enhance team collaboration, and ensure
              your projects run smoothly from start to finish.
          </p>
  
          <div class="grid gap-8 md:grid-cols-3">
              <!-- To-do List Card -->
              <div class="bg-[#cbdeed] p-6 rounded-lg shadow-md card animate-card animate">
                  <h3 class="text-lg font-semibold text-gray-800 mb-2">To-do List</h3>
                  <p class="text-sm text-gray-600 mb-4">
                      Organize your daily tasks effortlessly with our intuitive to-do list. Stay focused and
                      prioritize what matters most.
                  </p>
                  <div class="space-y-2">
                      <div class="flex items-center">
                          <input type="checkbox" checked class="h-5 w-5 text-yellow-500 rounded">
                          <label class="ml-3 text-gray-700">Mascot Illustration</label>
                      </div>
                      <div class="flex items-center">
                          <input type="checkbox" class="h-5 w-5 text-yellow-500 rounded">
                          <label class="ml-3 text-gray-700">Mobile Prototype</label>
                      </div>
                      <div class="flex items-center">
                          <input type="checkbox" class="h-5 w-5 text-yellow-500 rounded">
                          <label class="ml-3 text-gray-700">UI Design Kits</label>
                      </div>
                  </div>
              </div>
  
              <!-- Team Member Tracking Card -->
              <div class="bg-[#cbdeed] p-6 rounded-lg shadow-md card animate-card animate animate-delay-1s">
                  <h3 class="text-lg font-semibold text-gray-800 mb-2">Team Member Tracking</h3>
                  <p class="text-sm text-gray-600 mb-4">
                      Easily track your team members' progress and stay connected. Ensure everyone is aligned and
                      working towards shared goals.
                  </p>
                  <div class="bg-white p-4 rounded shadow-sm">
                      <p class="text-sm font-semibold text-gray-700">Team Members</p>
                      <div class="flex mt-2 space-x-2">
                          <!-- Team Member SVG Icons -->
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="30" height="64"
                              fill="currentColor">
                              <!-- Circle for the head -->
                              <circle cx="32" cy="20" r="12" fill="#4A5568" />
                              <!-- Body rectangle -->
                              <path d="M16,54c0-9,7-16,16-16s16,7,16,16v6H16Z" fill="#4A5568" />
                              <!-- Additional circles for team -->
                              <circle cx="48" cy="26" r="9" fill="#718096" />
                              <circle cx="16" cy="26" r="9" fill="#718096" />
                              <!-- Background shadow for subtle depth -->
                              <ellipse cx="32" cy="60" rx="28" ry="4"
                                  fill="rgba(0,0,0,0.1)" />
                          </svg>
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="30"
                              height="64" fill="currentColor">
                              <circle cx="32" cy="20" r="12" fill="#4A5568" />
                              <path d="M16,54c0-9,7-16,16-16s16,7,16,16v6H16Z" fill="#4A5568" />
                              <circle cx="48" cy="26" r="9" fill="#718096" />
                              <circle cx="16" cy="26" r="9" fill="#718096" />
                              <ellipse cx="32" cy="60" rx="28" ry="4"
                                  fill="rgba(0,0,0,0.1)" />
                          </svg>
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="30"
                              height="64" fill="currentColor">
                              <circle cx="32" cy="20" r="12" fill="#4A5568" />
                              <path d="M16,54c0-9,7-16,16-16s16,7,16,16v6H16Z" fill="#4A5568" />
                              <circle cx="48" cy="26" r="9" fill="#718096" />
                              <circle cx="16" cy="26" r="9" fill="#718096" />
                              <ellipse cx="32" cy="60" rx="28" ry="4"
                                  fill="rgba(0,0,0,0.1)" />
                          </svg>
                      </div>
                  </div>
              </div>
  
              <!-- Project Tracking Card -->
              <div class="bg-[#cbdeed] p-6 rounded-lg shadow-md card animate-card animate animate-delay-2s">
                  <h3 class="text-lg font-semibold text-gray-800 mb-2">Project Tracking</h3>
                  <p class="text-sm text-gray-200 mb-4">
                      Monitor project timelines and milestones in real-time. Keep projects on track and meet your
                      deadlines with confidence.
                  </p>
                  <div class="space-y-2">
                      <div class="bg-white p-3 rounded shadow-sm flex justify-between">
                          <p class="text-sm text-gray-200">Client Feedback Review</p>
                          <span class="text-gray-500 text-sm">In Progress</span>
                      </div>
                      <div class="bg-white p-3 rounded shadow-sm flex justify-between">
                          <p class="text-sm text-gray-200">SprintMaster Dashboard</p>
                          <span class="text-gray-500 text-sm">$12,000</span>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  

    <!-- Footer -->
    <footer class=" bg-gray-400 border-t border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 animate-fade-in">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Newsletter -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 hover-grow">Join our Task Management</h3>
                    <p class="text-sm text-gray-600 mt-2">Get updates from us weekly about project management.</p>
                    <div class="mt-4">
                        <form class="flex">
                            <input type="email" placeholder="Enter your email"
                                class="w-full px-4 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:bg-blue-300 transition-transform duration-300 transform hover:scale-105" />
                            <button type="submit"
                                class="bg-blue-500 text-white px-4 py-2 rounded-r-md hover:bg-blue-300 transition-colors duration-300">
                                Subscribe
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Contact Information -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 hover-grow">YowManage</h3>
                    <p class="text-sm text-gray-600 mt-2">
                        Address:<br>
                        Level 2, 45 Tech Avenue, Melbourne VIC 3000
                    </p>
                    <p class="text-sm text-gray-600 mt-4">
                        Contact:<br>
                        <a href="tel:1300987654" class="text-blue-300 hover:underline">1300 987 654</a><br>
                        <a href="mailto:support@yowmanage.com"
                            class="text-blue-300 hover:underline">support@yowmanage.com</a>
                    </p>
                    <div class="flex space-x-4 mt-4">
                        <a href="#"
                            class="text-gray-600 hover:text-[#90afc4] transition-transform duration-300 transform hover:scale-110">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="#"
                            class="text-gray-600 hover:text-[#90afc4] transition-transform duration-300 transform hover:scale-110">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#"
                            class="text-gray-600 hover:text-[#90afc4] transition-transform duration-300 transform hover:scale-110">
                            <i class="fab fa-linkedin"></i>
                        </a>
                        <a href="#"
                            class="text-gray-600 hover:text-[#90afc4] transition-transform duration-300 transform hover:scale-110">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>

                <!-- Sitemap and Links -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <h4 class="text-lg font-semibold text-gray-900 hover-grow">Sitemap</h4>
                        <ul class="mt-2 space-y-2">
                            <li><a href="#" class="text-gray-600 hover:underline hover-grow">Home</a></li>
                            <li><a href="#" class="text-gray-600 hover:underline hover-grow">Features</a></li>
                            <li><a href="#" class="text-gray-600 hover:underline hover-grow">Project</a></li>
                            <li><a href="#" class="text-gray-600 hover:underline hover-grow">Pricing</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold text-gray-900 hover-grow">Company</h4>
                        <ul class="mt-2 space-y-2">
                            <li><a href="#" class="text-gray-600 hover:underline hover-grow">About Us</a></li>
                            <li><a href="#" class="text-gray-600 hover:underline hover-grow">Careers</a></li>
                            <li><a href="#" class="text-gray-600 hover:underline hover-grow">Contact Us</a></li>
                            <li><a href="#" class="text-gray-600 hover:underline hover-grow">Blog</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="mt-8 border-t border-gray-200 pt-4">
                <div class="flex justify-between items-center">
                    <p class="text-sm text-gray-500">© 2024 YowManage. All rights reserved.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-600 hover:underline hover-grow">Privacy Policy</a>
                        <a href="#" class="text-gray-600 hover:underline hover-grow">Terms of Service</a>
                        <a href="#" class="text-gray-600 hover:underline hover-grow">Cookies Settings</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>
