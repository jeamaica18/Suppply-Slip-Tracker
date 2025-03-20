<script>
    // 1️⃣ Fade-in effect when the page loads
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelector(".login-container").style.opacity = "1";
        document.querySelector(".login-container").style.transform = "translateY(0)";
    });

    // 2️⃣ Show/Hide password toggle
    function togglePassword() {
        let passwordInput = document.getElementById("password");
        let eyeIcon = document.getElementById("togglePassword");
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            eyeIcon.innerText = "👁️";  // Change icon
        } else {
            passwordInput.type = "password";
            eyeIcon.innerText = "🔒";  // Change icon
        }
    }

    // 3️⃣ Form validation before submitting
    document.querySelector("form").addEventListener("submit", function (event) {
        let username = document.getElementById("username").value.trim();
        let password = document.getElementById("password").value.trim();
        if (username === "" || password === "") {
            event.preventDefault(); // Stop form from submitting
            alert("Please fill in both fields!");
        } else {
            // 4️⃣ Change login button text to "Logging in..."
            let loginButton = document.querySelector(".login-btn");
            loginButton.innerText = "Logging in...";
            loginButton.disabled = true;
        }
    });
</script>
</body>
</html>
