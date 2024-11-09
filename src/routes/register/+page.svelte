<script>
    import { goto } from '$app/navigation';
    import './register.css';

    let username = '';
    let password = '';

    async function register() {
        try {
            const response = await fetch('http://localhost/Laz-Bean-Cafe-POS/api/routes.php?request=add-account', {
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

            const contentType = response.headers.get('content-type');
            if (contentType && contentType.includes('application/json')) {
                // Log the response text for debugging
                const text = await response.text();
                console.log('Response text:', text);

                const result = JSON.parse(text); // Parse the text as JSON
                if (result.status) {
                    alert('Registration successful');
                    goto('/'); // Redirect to login page or another page
                } else {
                    alert(result.message);
                }
            } else {
                // Log the response text for debugging
                const text = await response.text();
                console.error('Unexpected response:', text);
                throw new Error('Invalid JSON response');
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