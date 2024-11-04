<script>
    import { goto } from '$app/navigation';
    import './register.css';
    let username = '';
	let password = '';
</script>
<div class="container">
  <div class="logo">
    <span class="logo-text">Shop Logo</span>
  </div>


  <div class="login-card">
    <label for="username">LOGIN</label>
    <input type="text" id="username" bind:value={username} placeholder="Username" />

    <label for="password">Password</label>
    <input type="password" id="password" bind:value={password} placeholder="Password" />

    <button on:click={() => goto('/Ordering')}>Register</button>

    <div class="register-link">
      Already have an account? <a href="/">Login.</a>
    </div>
  </div>
</div>