<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ asset('assets/js/dashboard.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script>
    // $(document).ready(function() {
    //     setTimeout(() => {
    //         $(".loader-overlay").css("display", "none");
    //     }, 500);
    // });

    document.addEventListener("DOMContentLoaded", function() {
        document.body.style.opacity = "1";
    });

    $(document).ready(function() {
        $("#message-input").keypress(function(event) {
            if (event.which === 13 && !event.shiftKey) {
                event.preventDefault(); // Prevents new line in textarea
                $("#send-btn").click(); // Triggers the send button click
            }
        });
    });

    $(document).ready(function() {
        // Hide loader after page loads completely
        setTimeout(() => {
            $('#loader').fadeOut();
        }, 500);

        // Toastr Notifications Configuration
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "timeOut": "5000"
        };

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
    });

    // Mobile Sidebar Toggle
    const hamburgerBtn = document.getElementById("hamburgerBtn");
    const sidebar = document.querySelector("nav");

    if (hamburgerBtn) {
        hamburgerBtn.addEventListener("click", () => {
            sidebar.classList.toggle("hidden");
        });
    }

    // Toggle Password Visibility
    const togglePassword = document.getElementById("togglePassword");
    const passwordInput = document.getElementById("password");

    if (togglePassword && passwordInput) {
        togglePassword.addEventListener("click", () => {
            const isPassword = passwordInput.type === "password";
            passwordInput.type = isPassword ? "text" : "password";
        });
    }

    function showLoader() {
        document.getElementById('loader').style.display = 'flex';
    }

    function hideLoader() {
        document.getElementById('loader').style.display = 'none';
    }

    document.addEventListener('DOMContentLoaded', function () {
        // Message input and send button logic
        const messageInput = document.getElementById('message-input');
        const sendBtn = document.getElementById('send-btn');

        if (messageInput && sendBtn) {
            function updateButtonState() {
                if (messageInput.value.trim() !== '') {
                    sendBtn.classList.remove('disabled');
                } else {
                    sendBtn.classList.add('disabled');
                }
            }

            updateButtonState();
            messageInput.addEventListener('input', updateButtonState);
        }

        // Folder dropdown logic
        const dropdownBtn = document.getElementById('folderDropdownBtn');
        const dropdownMenu = document.getElementById('folderDropdownMenu');

        if (dropdownBtn && dropdownMenu) {
            dropdownBtn.addEventListener('click', function (e) {
                e.stopPropagation();
                dropdownMenu.classList.toggle('hidden');
            });

            document.addEventListener('click', function () {
                dropdownMenu.classList.add('hidden');
            });
        }
    });
</script>
