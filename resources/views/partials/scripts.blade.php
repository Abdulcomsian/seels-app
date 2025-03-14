<script src="{{ URL::asset('build/libs/particles.js/particles.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/particles.app.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/password-addon.init.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script src="{{ asset('assets/js/dashboard.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.body.style.opacity = "1";
    });
</script>

<script>
    // Mobile Sidebar Toggle
    const hamburgerBtn = document.getElementById("hamburgerBtn");
    const sidebar = document.querySelector("nav");

    hamburgerBtn.addEventListener("click", () => {
        sidebar.classList.toggle("hidden");
    });

    // Toggle Password Visibility
    const togglePassword = document.getElementById("togglePassword");
    const passwordInput = document.getElementById("password");

    togglePassword.addEventListener("click", () => {
        const isPassword = passwordInput.type === "password";
        passwordInput.type = isPassword ? "text" : "password";
    });

    function showLoader() {
        document.getElementById('loader').classList.remove('hidden');
    }

    function hideLoader() {
        document.getElementById('loader').classList.add('hidden');
    }

    @if (Session::has('success'))
        toastr.success("{{ session('success') }}");
    @endif

    @if (Session::has('error'))
        toastr.error("{{ session('error') }}");
    @endif

    @if (Session::has('warning'))
        toastr.warning("{{ session('warning') }}");
    @endif

    @if (Session::has('info'))
        toastr.info("{{ session('info') }}");
    @endif
</script>
