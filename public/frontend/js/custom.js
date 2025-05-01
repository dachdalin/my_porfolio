// Set current year in footer
document.getElementById('current-year').textContent = new Date().getFullYear();

// Mobile menu toggle
const mobileMenuButton = document.getElementById('mobile-menu-button');
const mobileMenu = document.getElementById('mobile-menu');

mobileMenuButton.addEventListener('click', () => {
  mobileMenu.classList.toggle('hidden');
});

// Close mobile menu when clicking on a link
const mobileLinks = mobileMenu.querySelectorAll('a');
mobileLinks.forEach(link => {
  link.addEventListener('click', () => {
    mobileMenu.classList.add('hidden');
  });
});

// Dark mode toggle
const themeToggle = document.getElementById('theme-toggle');

// Check for saved theme preference or use system preference
const savedTheme = localStorage.getItem('theme') ||
  (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');

// Apply the saved theme
if (savedTheme === 'dark') {
  document.documentElement.classList.add('dark');
} else {
  document.documentElement.classList.remove('dark');
}

// Toggle theme
themeToggle.addEventListener('click', () => {
  if (document.documentElement.classList.contains('dark')) {
    document.documentElement.classList.remove('dark');
    localStorage.setItem('theme', 'light');
  } else {
    document.documentElement.classList.add('dark');
    localStorage.setItem('theme', 'dark');
  }
});

// Contact form submission
const contactForm = document.getElementById('contact-form');

contactForm.addEventListener('submit', (e) => {
  e.preventDefault();

  // Get form data
  const name = document.getElementById('name').value;
  const email = document.getElementById('email').value;
  const message = document.getElementById('message').value;

  // In a real application, you would send this data to your server
  console.log('Form submitted:', { name, email, message });

  // Show success message (in a real app, do this after successful submission)
  alert('Thanks for your message! I\'ll get back to you soon.');

  // Reset form
  contactForm.reset();
});

// Snowflake animation
const snowflakeCount = 100;

for (let i = 0; i < snowflakeCount; i++) {
    const flake = document.createElement("div");
    flake.classList.add("snowflake");

    const size = Math.random() * 5 + 2;
    const left = Math.random() * 100;
    const duration = Math.random() * 10 + 5; // 5s to 15s
    const delay = Math.random() * 10;

    flake.style.width = `${size}px`;
    flake.style.height = `${size}px`;
    flake.style.left = `${left}vw`;
    flake.style.animationDuration = `${duration}s`;
    flake.style.animationDelay = `-${delay}s`;

    if (i % 6 === 0) {
        flake.style.filter = "blur(1px)";
    }

    document.body.appendChild(flake);
}
