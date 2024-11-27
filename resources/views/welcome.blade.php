<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management </title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        /* Feature Card Hover Effects */
.feature-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.feature-card:hover {
    transform: scale(1.05);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
}

/* Icon Zoom Effect */
.icon-wrapper {
    transition: transform 0.3s ease;
}

.feature-card:hover .icon-wrapper {
    transform: scale(1.2);
}

/* Click Animation */
.feature-card:active {
    transform: scale(0.95);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
}

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

<body class="bg-white text-gray-400 font-sans">
    <!-- Header -->
    <header class="flex justify-between items-center p-6 shadow-md shadow-gray-200 border-gray-200">
        <div class="text-lg font-bold">
            Smart<span class="text-[#599ac5]">Tasker</span>
        </div>
        <div class="flex justify-end gap-2"><button
                class="bg-[#69b3e3] px-4 py-2 rounded-md text-white hover:bg-blue-300"><a href="{{ route('register') }}"
                    class="cta-button">Register</a></button>
            <button class="bg-[#69b3e3] px-4 py-2 rounded-md text-white hover:bg-blue-300"> <a
                    href="{{ route('login') }}" class="cta-button">Log In</a></button>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="   font-sans text-center py-20 px-6">
        <!-- Title -->
        <h1 class="text-4xl md:text-4xl fade-in-up font-bold font-medium text-[#69b3e3]">
            YOUR ULTIMATE TASK MANAGEMENT SOLUTION
        </h1>
        <!-- Subtitle -->
        <p class="text-gray-400 mt-6 fade-in-up text-lg md:text-xl max-w-3xl mx-auto">
            Discover a smarter way to manage your tasks with <span class="text-text-[#599ac5]">Task Management.</span> Say
            goodbye to chaos and hello to
            productivity.
        </p>

        <!-- Content -->
        <div class="mt-16 flex flex-col md:flex-row items-center gap-12 px-6">
            <!-- Image -->
            <div ><script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
            <dotlottie-player src="https://lottie.host/714c3e96-1946-47e2-9ec1-4c3b8025f35e/VcrjKKxLBp.lottie" background="transparent" speed="1" style="width: 50vw; height: 50vh" loop autoplay></dotlottie-player>            
        </div>
            <!-- Text Description -->
            <div class="text-left">
                <p class="text-lg md:text-xl fade-in-up">
                    Organize and track the progress of your team's tasks in one place. Whether you're assigning new
                    tasks, reviewing ongoing work, or collaborating on shared goals, this dashboard has everything you
                    need to stay on track.
                </p>
                <a href="#"
                    class="mt-6 inline-block bg-[#69b3e3] hover:bg-[#90afc4] text-white px-6 py-3 rounded-md shadow-lg text-lg font-medium transition-all duration-300 fade-in-up">
                    Get Started Now
                </a>
            </div>
        </div>
    </section>


    <!-- Features -->
    <section id="features" class="py-20 mb-6">
        <h2 class="text-center text-3xl font-bold fade-in text-[#69b3e3]">
            We can help manage your work more efficiently
        </h2>
    
        <!-- First Row of Features -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12 max-w-6xl mx-auto">
            <!-- Task Organization -->
            <div class="feature-card flex flex-col rounded-xl shadow-2xl px-8 py-7 bg-white border-2 border-gray-100 items-center">
                <div class="icon-wrapper p-4 w-16 bg-blue-300 rounded-full mb-4 flex justify-center items-center">
                    <i class="fas fa-tasks text-white text-2xl"></i>
                </div>
                <h3 class="font-bold text-lg text-gray-800">Task Organization</h3>
                <p class="text-gray-500 text-center mt-2">
                    Easily create, organize, and prioritize tasks with our intuitive interface.
                </p>
            </div>
    
            <!-- Deadline Reminders -->
            <div class="feature-card flex flex-col rounded-xl shadow-2xl px-8 py-7 bg-white border-2 border-gray-100 items-center">
                <div class="icon-wrapper p-4 w-16 bg-blue-300 rounded-full mb-4 flex justify-center items-center">
                    <i class="fas fa-bell text-white text-2xl"></i>
                </div>
                <h3 class="font-bold text-lg text-gray-800">Deadline Reminders</h3>
                <p class="text-center text-gray-500 mt-2">
                    Never miss a deadline again with customizations and notifications.
                </p>
            </div>
    
            <!-- Collaborative Work -->
            <div class="feature-card flex flex-col rounded-xl shadow-2xl px-8 py-7 bg-white border-2 border-gray-100 items-center">
                <div class="icon-wrapper p-4 w-16 bg-blue-300 rounded-full mb-4 flex justify-center items-center">
                    <i class="fas fa-users text-white text-2xl"></i>
                </div>
                <h3 class="font-bold text-lg text-gray-800">Collaborative Work</h3>
                <p class="text-center text-gray-500 mt-2">
                    Collaborate seamlessly with your team members for shared success.
                </p>
            </div>
        </div>
    
        <!-- Second Row of Features -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12 max-w-6xl mx-auto">
            <!-- Progress Tracking -->
            <div class="feature-card flex flex-col rounded-xl shadow-2xl px-8 py-7 bg-white border-2 border-gray-100 items-center">
                <div class="icon-wrapper p-4 w-16 bg-blue-300 rounded-full mb-4 flex justify-center items-center">
                    <i class="fas fa-chart-line text-white text-2xl"></i>
                </div>
                <h3 class="font-bold text-lg text-gray-800">Progress Tracking</h3>
                <p class="text-center text-gray-500 mt-2">
                    Monitor your progress and achievements with insightful analytics and reports.
                </p>
            </div>
    
            <!-- Task Templates -->
            <div class="feature-card flex flex-col rounded-xl shadow-2xl px-8 py-7 bg-white border-2 border-gray-100 items-center">
                <div class="icon-wrapper p-4 w-16 bg-blue-300 rounded-full mb-4 flex justify-center items-center">
                    <i class="fas fa-file-alt text-white text-2xl"></i>
                </div>
                <h3 class="font-bold text-lg text-gray-800">Task Templates</h3>
                <p class="text-center text-gray-500 mt-2">
                    Save time by using pre-made templates for common tasks and projects.
                </p>
            </div>
    
            <!-- Cross-Platform Sync -->
            <div class="feature-card flex flex-col rounded-xl shadow-2xl px-8 py-7 bg-white border-2 border-gray-100 items-center">
                <div class="icon-wrapper p-4 w-16 bg-blue-300 rounded-full mb-4 flex justify-center items-center">
                    <i class="fas fa-sync-alt text-white text-2xl"></i>
                </div>
                <h3 class="font-bold text-lg text-gray-800">Cross-Platform Sync</h3>
                <p class="text-center text-gray-500 mt-2">
                    Access your tasks from anywhere, on any device with real-time synchronization.
                </p>
            </div>
        </div>
    </section>
    
    
  
    <section class="bg-gray-600 text-white py-12">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid gap-8 md:grid-cols-4 text-center">
                <!-- Statistic 1 -->
                <div>
                    <h3 class="text-4xl text-[#599ac5] font-bold">15,000+</h3>
                    <p class="mt-2 text-sm">
                        Projects managed with YowManage, streamlining team workflows and achieving goals.
                    </p>
                </div>

                <!-- Statistic 2 -->
                <div>
                    <h3 class="text-4xl text-[#599ac5] font-bold">1,300+</h3>
                    <p class="mt-2 text-sm">
                        Teams collaborating daily on YowManage, improving communication and efficiency across various
                        projects.
                    </p>
                </div>

                <!-- Statistic 3 -->
                <div>
                    <h3 class="text-4xl text-[#599ac5] font-bold">150,000+</h3>
                    <p class="mt-2 text-sm">
                        Tasks completed with YowManage, helping teams stay on schedule and meet deadlines.
                    </p>
                </div>

                <!-- Statistic 4 -->
                <div>
                    <h3 class="text-4xl text-[#599ac5] font-bold">95%</h3>
                    <p class="mt-2 text-sm">
                        User satisfaction with YowManage, reflecting improved project efficiency and teamwork.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="font-sans text-center mt-3 py-5 px-6">
        <!-- Title -->
        <h1 class="text-center text-3xl font-bold fade-in text-[#599ac5]">
            Analytics Tool
        </h1>
    
        <div class="flex flex-col md:flex-row justify-center items-center gap-12 ">
            <!-- Text Description -->
            <div class="text-left w-full  md:w-1/2">
                <p class=" md:text-xl fade-in-up">
                    "Simplify your task management processes with our advanced analytics tool. Designed for modern teams, it allows you to track tasks, visualize progress in real time, and quickly identify areas for improvement. With an intuitive interface and collaborative features, our solution transforms the way you work by providing clear insights into your performance and key data for smarter decision-making. "
                </p>
            </div>
    
            <!-- Animated Lottie Player -->
            <div class="w-full md:w-1/2 flex justify-center">
                <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
                <dotlottie-player
                    src="https://lottie.host/52e8da82-8571-4927-95f0-a5c70797e909/UO8yZddMhg.lottie"
                    background="transparent"
                    speed="1"
                    style="width: 100%; max-width: 500px; height: auto;"
                    loop
                    autoplay>
                </dotlottie-player>
            </div>
        </div>
    </section>
    
    <!-- Pricing -->
 <!-- Pricing -->
<section class="font-sans">
    <div class="max-w-7xl mx-auto py-12 px-6">
      <h2 class="text-4xl font-bold text-center text-[#69b3e3] mb-6">Key features to boost your productivity</h2>
      <p class="text-center text-gray-500 mb-12">
        Explore the essential tools designed to streamline your workflow, enhance team collaboration, and ensure
        your projects run smoothly from start to finish.
      </p>
  
      <div class="grid gap-8 md:grid-cols-3">
        <!-- To-do List Card -->
        <div class="flex flex-col rounded-xl shadow-2xl px-8 py-7 bg-white border-2 border-gray-100 items-center transform transition-transform duration-300 hover:scale-105 hover:shadow-lg">
          <h3 class="text-lg font-semibold text-black mb-2">To-do List</h3>
          <p class="text-gray-500 text-center mb-4">
            Organize your daily tasks effortlessly with our intuitive to-do list. Stay focused and
            prioritize what matters most.
          </p>
          <div class="space-y-2">
            <div class="flex items-center">
              <input type="checkbox" checked class="h-5 w-5 text-yellow-500 rounded">
              <label class="ml-3 text-gray-500">Mascot Illustration</label>
            </div>
            <div class="flex items-center">
              <input type="checkbox" class="h-5 w-5 text-yellow-500 rounded">
              <label class="ml-3 text-gray-500">Mobile Prototype</label>
            </div>
            <div class="flex items-center">
              <input type="checkbox" class="h-5 w-5 text-yellow-500 rounded">
              <label class="ml-3 text-gray-500">UI Design Kits</label>
            </div>
          </div>
        </div>
  
        <!-- Team Member Tracking Card -->
        <div class="flex flex-col rounded-xl shadow-2xl px-8 py-7 bg-white border-2 border-gray-100 items-center transform transition-transform duration-300 hover:scale-105 hover:shadow-lg hover:bg-gray-50">
          <h3 class="text-lg font-semibold text-black mb-2">Team Member Tracking</h3>
          <p class="text-gray-500 text-center mb-4">
            Easily track your team members' progress and stay connected. Ensure everyone is aligned and
            working towards shared goals.
          </p>
          <div class="bg-gray-100 p-3 rounded shadow-sm flex justify-between gap-2">
            <p class="text-sm text-gray-800">Team Members</p>
            <div class="flex mt-2">
              <!-- Team Member SVG Icons -->
              <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
              <dotlottie-player src="https://lottie.host/f5f2464d-f9c7-4f3f-b93e-ba4295d09926/UhFhxFp8u3.lottie" background="transparent" speed="1" style="width: 100px; height: 70px" loop autoplay></dotlottie-player>
            </div>
          </div>
        </div>
  
        <!-- Project Tracking Card -->
        <div class="flex flex-col rounded-xl shadow-2xl px-8 py-7 bg-white border-2 border-gray-100 items-center transform transition-transform duration-300 hover:scale-105 hover:shadow-lg hover:bg-gray-50">
          <h3 class="text-lg font-semibold text-black mb-2">Project Tracking</h3>
          <p class="text-gray-500 text-center mb-4">
            Monitor project timelines and milestones in real-time. Keep projects on track and meet your
            deadlines with confidence.
          </p>
          <div class="space-y-2">
            <div class="bg-gray-100 p-3 rounded shadow-sm flex justify-between gap-2">
              <p class="text-sm text-gray-800">Client Feedback Review</p>
              <span class="text-[#a7cee4] font-semibold"> In Progress</span>
            </div>
            <div class="bg-gray-100 p-3 rounded shadow-sm flex justify-between gap-2">
              <p class="text-sm text-gray-800">SprintMaster Dashboard</p>
              <span class="text-[#a7cee4] font-semibold">$12,000</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  

  

    <!-- Footer -->
   <footer class="bg-gray-600  rounded-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 ">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Newsletter -->
            <div>
                <h3 class="text-lg font-semibold text-[#599ac5]">Join our Task Management</h3>
                <p class="text-sm text-white mt-2">
                    Get updates from us weekly about project management.
                </p>
                <div class="mt-4">
                    <form class="flex">
                        <input
                            type="email"
                            placeholder="Enter your email"
                            class="w-full px-4 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:[#599ac5] transition-transform duration-300 transform hover:scale-105"
                        />
                        <button
                            type="submit"
                            class="bg-blue-300 text-white px-4 py-2 rounded-r-md hover:bg-blue-400 transition-colors duration-300"
                        >
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>

            <!-- Contact Information -->
            <div>
                <h3 class="text-lg font-semibold text-gray-200">YowManage</h3>
                <p class="text-sm text-gray-200 mt-2">
                    <strong>Address:</strong><br>
                    Level 2, 45 Tech Avenue, Melbourne VIC 3000
                </p>
                <p class="text-sm text-gray-200 mt-4">
                    <strong>Contact:</strong><br>
                    <a href="tel:1300987654" class="text-[#599ac5] hover:underline">1300 987 654</a><br>
                    <a href="mailto:support@yowmanage.com" class="text-[#599ac5] hover:underline">
                        support@yowmanage.com
                    </a>
                </p>
                <div class="flex space-x-4 mt-4">
                    <a
                        href="#"
                        class="text-gray-600 hover:text-[#599ac5] transition-transform duration-300 transform hover:scale-110"
                    >
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a
                        href="#"
                        class="text-gray-600 hover:text-[#599ac5] transition-transform duration-300 transform hover:scale-110"
                    >
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a
                        href="#"
                        class="text-gray-600 hover:text-[#599ac5] transition-transform duration-300 transform hover:scale-110"
                    >
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a
                        href="#"
                        class="text-gray-600 hover:text-[#599ac5] transition-transform duration-300 transform hover:scale-110"
                    >
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>

            <!-- Sitemap and Links -->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <h4 class="text-lg font-semibold text-white">Sitemap</h4>
                    <ul class="mt-2 space-y-2">
                        <li><a href="#" class="text-gray-200 hover:underline">Home</a></li>
                        <li><a href="#" class="text-gray-200 hover:underline">Features</a></li>
                        <li><a href="#" class="text-gray-200 hover:underline">Project</a></li>
                        <li><a href="#" class="text-gray-200 hover:underline">Pricing</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-white">Company</h4>
                    <ul class="mt-2 space-y-2">
                        <li><a href="#" class="text-gray-200 hover:underline">About Us</a></li>
                        <li><a href="#" class="text-gray-200 hover:underline">Careers</a></li>
                        <li><a href="#" class="text-gray-200 hover:underline">Contact Us</a></li>
                        <li><a href="#" class="text-gray-200 hover:underline">Blog</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="mt-8 border-t border-gray-200 pt-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <p class="text-sm text-gray-200">© 2024 YowManage. All rights reserved.</p>
                <div class="flex space-x-4 mt-4 md:mt-0">
                    <a href="#" class="text-gray-200 hover:underline">Privacy Policy</a>
                    <a href="#" class="text-gray-200 hover:underline">Terms of Service</a>
                    <a href="#" class="text-gray-200 hover:underline">Cookies Settings</a>
                </div>
            </div>
        </div>
    </div>
</footer>


</body>

</html>
