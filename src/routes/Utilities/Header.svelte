<script lang="ts">
  import { goto } from '$app/navigation';
  export const title = "All Items";
  export let currentPage: string;

  function navigateToCart() {
    goto('/Cart', { replaceState: true });
  }
</script>

<style>
  header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 5px;
    background-color: #d2a07e;
    position: sticky;
    top: 0;
    z-index: 3000;
    width: 100%;
  }

  nav {
    display: flex;
    gap: 20px;
    text-align: center;
    font-size: 30px;
    font-family: 'Crimson text';
    gap: 21%;
    padding-left: 20px;
  }

  input[type="text"] {
    padding: 4px;
    border-radius: 5px;
    border: 1px solid #606C38;
  }

  .dropdown {
    display: none;
  }

  @media (max-width: 768px) {
    nav {
      display: none;
    }
    
    .dropdown {
      display: block;
      background-color: #d2a07e;
      padding: 5px;
      border-radius: 5px;
    }

    .dropdown-content {
      display: flex;
      flex-direction: column;
      gap: 10px;
    }
  }
</style>

<header>
  <div class="dropdown">
    <button onclick={() => document.querySelector('.dropdown-content')?.classList.toggle('show')}>
      ☰ Menu
    </button>
    <div class="dropdown-content">
      {#if currentPage === 'ordering'}
        <button onclick={() => goto('/Edit')}>Edit</button>
      {:else if currentPage === 'edit'}
        <button onclick={() => goto('/Ordering')}>Menu</button>
      {:else if currentPage === 'cart'}
        <button onclick={() => goto('/Ordering')}>Menu</button>
      {/if}
      <button onclick={() => goto('/Stocks')}>Stock</button>
      <button onclick={() => goto('/Sales')}>Sales</button>
      <button onclick={() => goto('/Cart')}>Cart</button>
      <button onclick={() => goto('/')}>Logout</button>
      <input type="text" placeholder="Search...." />
    </div>
  </div>
  <nav>
    {#if currentPage === 'ordering'}
      <button onclick={() => goto('/Edit')}>Edit</button>
    {:else if currentPage === 'edit'}
      <button onclick={() => goto('/Ordering')}>Menu</button>
    {:else if currentPage === 'cart'}
      <button onclick={() => goto('/Ordering')}>Menu</button>
    {/if}
    <button onclick={() => goto('/Stocks')}>Stock</button>
    <button onclick={() => goto('/Sales')}>Sales</button>
    <button onclick={() => goto('/Cart')}>Cart</button>
    <button onclick={() => goto('/')}>Logout</button>
    <input style="background:#606C38;" type="text" placeholder="Search...." />
  </nav>
</header>
