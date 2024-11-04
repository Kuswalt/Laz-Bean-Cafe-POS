<script>
    import { goto } from '$app/navigation';
    import './register.css';

    let username = '';
    let password = '';

    async function register() {
        try {
            const response = await fetch('http://localhost/Laz-Bean-Cafe-POS/api/routes.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    action: 'add-account',
                    username,
                    password
                })
            });

            const result = await response.json();
            if (result.status) {
                alert('Registration successful');
                goto('/'); // Redirect to login page or another page
            } else {
                alert(result.message);
            }
        } catch (error) {
            console.error('Error during registration:', error);
            alert('An error occurred. Please try again.');
        }
    }
</script>

<div class="container">
  <div class="logo">
    <span class="logo-text">Shop Logo</span>
  </div>

  <div class="login-card">
    <label for="username">REGISTER</label>
    <input type="text" id="username" bind:value={username} placeholder="Username" />

    <label for="password">Password</label>
    <input type="password" id="password" bind:value={password} placeholder="Password" />

    <button on:click={register}>Register</button>

    <div class="register-link">
      Already have an account? <a href="/">Login.</a>
    </div>
  </div>
</div>