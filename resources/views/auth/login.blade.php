<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - MFP Academy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f5f5;
        }
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }        .login-container {
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            border-radius: 1rem;
            overflow: hidden;
            min-height: 600px;
            width: 100%;
            max-width: 98%;  /* Meningkatkan lebar maksimum container */
        }
        
        @media (min-width: 768px) {
            .login-container {
                max-width: 90%;
            }
        }
        
        @media (min-width: 1024px) {
            .login-container {
                max-width: 85%;
            }
        }.login-card {
            background: white;
            overflow: hidden;
            position: relative;
            border-radius: 1rem;
        }
        .login-card::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(to right, #ef4444, #f43f5e);
        }.athlete-illustration-container {
            position: relative;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .athlete-illustration-container img {
            transition: transform 0.3s ease-in-out;
        }
        .athlete-illustration-container:hover img {
            transform: scale(1.05);
        }        .login-form {
            padding: 2.5rem;
            max-width: 520px;  /* Meningkatkan lebar maksimum form */
            margin: 0 auto;
        }
        .animated-background {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, #e5e7eb 0%, #f3f4f6 100%);
            overflow: hidden;
            z-index: -1;
        }
        .animated-shape {
            position: absolute;
            background: linear-gradient(135deg, #ef4444 0%, #f43f5e 100%);
            opacity: 0.1;
            border-radius: 50%;
        }
        .role-selector {
            display: flex;
            gap: 1rem;
        }
        .role-option input[type="radio"] {
            display: none;
        }
        .role-option label {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 1rem;
            border: 2px solid #e5e7eb;
            border-radius: 0.5rem;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        .role-option input[type="radio"]:checked + label {
            border-color: #ef4444;
            background-color: #fef2f2;        }        .form-input {
            @apply w-full px-5 py-4 rounded-lg border-2 border-gray-400 focus:outline-none focus:border-red-500 focus:shadow-md transition duration-200 text-base;
            height: 60px; /* Meningkatkan tinggi field */
            min-width: 100%;
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
        }
          @media (min-width: 768px) {
            .form-input {
                width: 100%; /* Memastikan form input mengisi seluruh lebar container pada desktop */
                font-size: 1.05rem; /* Sedikit memperbesar ukuran font pada desktop */
            }
        }.form-input::placeholder {
            color: #9ca3af;
            opacity: 0.8;
            text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
        }
        .form-input:focus {
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.15);
        }
        .form-label {
            @apply block text-base font-medium text-gray-800 mb-2 transition-all duration-200;
        }        .form-group {
            position: relative;
            margin-bottom: 2rem;
            width: 100%;
            max-width: 100%;
        }.input-focus-indicator {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 2px;
            width: 0;
            background-color: #ef4444;
            transition: width 0.3s ease;
        }
        .form-input:focus + .input-focus-indicator {
            width: 100%;
        }        .relative {
            position: relative;
            width: 100%;
            display: flex;
        }        .brand-logo {
            max-width: 120px;
            margin-bottom: 1.5rem;
        }
        
        @media (min-width: 768px) {
            .form-input {
                min-width: 400px; /* Minimal lebar pada desktop */
            }
        }
    </style>
</head>
<body>
    <div class="animated-background">
        <div class="animated-shape" style="width: 600px; height: 600px; top: -300px; right: -100px;"></div>
        <div class="animated-shape" style="width: 400px; height: 400px; bottom: -100px; left: -200px;"></div>
        <div class="animated-shape" style="width: 300px; height: 300px; top: 50%; right: 25%; transform: translateY(-50%);"></div>
    </div>
      <div class="min-h-screen flex items-center justify-center p-4">        <!-- Mobile Logo - Only visible on small screens -->
        <div class="md:hidden absolute top-8 w-full text-center">
            <div class="inline-flex items-center justify-center mb-4">
                <div class="w-20 h-20 overflow-hidden rounded-full border-2 border-red-600">
                    <img src="{{ asset('template/img/mfp/login_image.png') }}" class="w-full h-full object-cover" alt="MFP Academy">
                </div>
            </div>
        </div>        <div class="login-container flex flex-col md:flex-row w-full max-w-7xl mt-16 md:mt-0"><!-- Login Form -->
            <div class="login-card w-full md:w-2/3 lg:w-1/2 md:rounded-r-none">
        <div class="login-form">
                    <div class="text-center mb-8">
                        <h1 class="text-3xl font-bold text-gray-800 mb-2">MFP ACADEMY</h1>
                        <p class="text-gray-600">Silahkan masukkan detail akun Anda</p>
                    </div>
                    <div class="w-full max-w-full mx-auto">

                @if ($errors->any())
                    <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6">
                        <div class="flex">
                            <div>
                                <p class="text-sm text-red-700">
                                    <ul class="list-disc pl-5 space-y-1">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </p>
                            </div>
                        </div>
                    </div>
                @endif

                <form action="{{ route('login.submit') }}" method="POST">
                    @csrf                    <div class="space-y-6">                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none z-10">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                    </svg>
                                </div><input type="email" 
                                       name="email" 
                                       id="email" 
                                       placeholder="Masukkan email Anda" 
                                       value="{{ old('email') }}"
                                       class="form-input pl-12 pr-4"
                                       required>
                                <div class="input-focus-indicator"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="form-label">Password</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none z-10">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                    </svg>
                                </div><input type="password" 
                                       name="password" 
                                       id="password" 
                                       placeholder="Masukkan password Anda"                                       class="form-input pl-12 pr-12"
                                       autocomplete="current-password"
                                       required>
                                <div class="input-focus-indicator"></div>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-4">
                                    <button type="button" id="toggle-password" class="focus:outline-none text-gray-500 hover:text-gray-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" id="eye-icon" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" id="eye-off-icon" class="hidden h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M3.28 2.22a.75.75 0 00-1.06 1.06l14.5 14.5a.75.75 0 001.06-1.06l-1.745-1.745a10.029 10.029 0 003.3-4.38 1.651 1.651 0 000-1.185A10.004 10.004 0 009.999 3a9.956 9.956 0 00-4.744 1.194L3.28 2.22zM7.752 6.69l1.092 1.092a2.5 2.5 0 013.374 3.373l1.091 1.092a4 4 0 00-5.557-5.557z" clip-rule="evenodd" />
                                            <path d="M10.748 13.93l2.523 2.523a9.987 9.987 0 01-3.27.547c-4.258 0-7.894-2.66-9.337-6.41a1.651 1.651 0 010-1.186A10.007 10.007 0 012.839 6.02L6.07 9.252a4 4 0 004.678 4.678z" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="input-focus-indicator"></div>
                            </div>
                        </div>                        
                        <div class="mt-2">
                            <label class="form-label">Masuk sebagai:</label>
                            <div class="role-selector">
                                <div class="role-option w-1/2">
                                    <input type="radio" name="role" id="peserta" value="peserta" {{ old('role') == 'peserta' ? 'checked' : '' }} required>
                                    <label for="peserta" class="text-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mb-1 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                        <span>Peserta</span>
                                    </label>
                                </div>
                                <div class="role-option w-1/2">
                                    <input type="radio" name="role" id="coach" value="coach" {{ old('role') == 'coach' ? 'checked' : '' }} required>
                                    <label for="coach" class="text-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mb-1 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                        <span>Coach</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                          <div class="flex items-center mt-2">
                            <input id="remember" name="remember" type="checkbox"
                                   class="h-5 w-5 text-red-600 focus:ring-red-500 focus:ring-2 focus:ring-offset-1 border-gray-400 rounded">
                            <label for="remember" class="ml-2 block text-base text-gray-800 select-none">
                                Ingat saya
                            </label>
                        </div>                        <button type="submit"
                                class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-4 px-5 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50 transition duration-200 shadow-md hover:shadow-lg text-lg mt-4">
                            Masuk
                        </button>
                    </div>                </form>
                    </div>
                </div>
            </div>
            
            <!-- Athlete Illustration -->
            <div class="hidden md:flex md:w-1/3 lg:w-1/2 items-center justify-center bg-gradient-to-br from-red-500 to-red-700 rounded-r-lg relative overflow-hidden p-0">
                <div class="athlete-illustration-container relative z-10 w-full h-full">
                    <img src="{{ asset('template/img/mfp/login_image.png') }}" class="object-cover w-full h-full" alt="MFP Academy Athlete">
                </div>
                <!-- Decorative overlay for better text visibility -->
                <div class="absolute bottom-0 left-0 w-full h-1/3 bg-gradient-to-t from-black/50 to-transparent"></div>
                <div class="absolute bottom-8 left-0 w-full text-white text-center space-y-4 z-10">
                    <h1 class="text-3xl font-bold">MFP ACADEMY</h1>
                    <p class="text-xl">Kembangkan Potensi Anda</p>
                </div>
            </div>
        </div>
    </div>    <script>
        // Animasi sedikit pergerakan pada latar belakang
        document.addEventListener('DOMContentLoaded', function() {
            const shapes = document.querySelectorAll('.animated-shape');
            
            shapes.forEach((shape, index) => {
                const speed = 0.01 + (index * 0.005);
                let position = 0;
                
                function animate() {
                    position += speed;
                    const translateY = Math.sin(position) * 15;
                    const translateX = Math.cos(position) * 15;
                    
                    shape.style.transform = `translate(${translateX}px, ${translateY}px)`;
                    
                    requestAnimationFrame(animate);
                }
                
                animate();
            });

            // Toggle password visibility
            const togglePassword = document.getElementById('toggle-password');
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            const eyeOffIcon = document.getElementById('eye-off-icon');

            if (togglePassword && passwordInput) {
                togglePassword.addEventListener('click', function() {
                    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordInput.setAttribute('type', type);
                    
                    // Toggle visibility of eye icons
                    eyeIcon.classList.toggle('hidden');
                    eyeOffIcon.classList.toggle('hidden');
                });
            }

            // Add input field animation effects
            const inputs = document.querySelectorAll('.form-input');
            
            inputs.forEach(input => {
                // Show label on focus
                input.addEventListener('focus', function() {
                    this.parentElement.parentElement.querySelector('.form-label').classList.add('text-red-600');
                });
                
                // Remove highlight when not focused
                input.addEventListener('blur', function() {
                    if (!this.value) {
                        this.parentElement.parentElement.querySelector('.form-label').classList.remove('text-red-600');
                    }
                });
                      // Check for existing values (e.g., when form reloads after validation)
                if (input.value) {
                    input.parentElement.parentElement.querySelector('.form-label').classList.add('has-value');
                }
                
                // Handle text overflow for long inputs
                input.addEventListener('input', function() {
                    // Ensure text stays within bounds
                    if (this.scrollWidth > this.clientWidth) {
                        this.style.textAlign = 'left';
                    } else {
                        this.style.textAlign = '';
                    }
                });
                  // Initial check for long inputs
                if (input.value && input.scrollWidth > input.clientWidth) {
                    input.style.textAlign = 'left';
                }
                
                // Add enhanced focus visual effect
                input.addEventListener('focus', function() {
                    this.classList.add('ring-2', 'ring-red-200');
                });
                
                input.addEventListener('blur', function() {
                    this.classList.remove('ring-2', 'ring-red-200');
                });
            });
        });
    </script>
</body>
</html>
