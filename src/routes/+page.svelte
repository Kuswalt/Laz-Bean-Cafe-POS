<script lang="ts">
    import { goto } from '$app/navigation';
    import { onMount } from 'svelte';

    let username = '';
    let password = '';

    async function login() {
        const response = await fetch('http://localhost/Laz-Bean-Cafe-POS/api/routes.php?request=login', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                action: 'login',
                username,
                password
            })
        });

        const result = await response.json();
        if (result.status) {
            goto('/Ordering');
        } else {
            alert(result.message);
        }
    }

</script>

<div class="container">
  <!-- Logo Section -->
  <div class="logo">
    <span class="logo-text">Shop Logo</span>
  </div>

  <!-- Login Card -->
  <div class="login-card">
    <label for="username">LOGIN</label>
    <input type="text" id="username" bind:value={username} placeholder="Username" />

    <label for="password">Password</label>
    <input type="password" id="password" bind:value={password} placeholder="Password" />

    <button on:click={login}>Login</button>

    <div class="register-link">
      No Account? <a href="/register" on:click>Register.</a>
    </div>
  </div>
</div>

<style>
  
.container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    position: relative;
    top: 3rem;
    left: 10rem;
}

.logo {
    position: relative;
    top: -2rem;
    width: 60rem;
    height: 20rem;
    background-color: #d3d3d3;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 10px;
    margin-bottom: 20px;
}

.logo-text {
    font-size: 24px;
    font-weight: bold;
    color: #333;
}

.login-card {
    width: 45%;
    padding: 15px;
    background-color: #fceaea;
    border-radius: 10px;
    box-shadow: -15px 14px 10px rgba(0, 0, 0, .7);
    border: 2px solid #030202;
    font-family: 'Crimson Text', serif;
    font-size: 1.5rem;
}

.login-card input[type="text"],
.login-card input[type="password"] {
    width: 100%;
    padding: 1px;
    margin: 10px 0;
    border-radius: 5px;
    border: 1px solid #ccc;
    font-family: 'Crimson Text', serif;
}

.login-card button {
    position: relative;
    left: 30%;
    width: 40%;
    padding: 1px;
    margin-top: 10px;
    background-color: #f5f5f5;
    border-radius: 5px;
    border: 1px solid #ccc;
    cursor: pointer;
}

.register-link {
    display: block;
    text-align: center;
    margin-top: 10px;
    font-size: 0.9em;
}

.register-link a {
    text-decoration: none;
}

.register-link a:hover {
    text-decoration: underline;
}
</style>