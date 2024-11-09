<script lang="ts">
  import { goto } from '$app/navigation';
  import Header from '../Utilities/Header.svelte';
  import Sidebar from '../Utilities/Sidebar.svelte';
  import './Ordering.css';

  let selectedCategory: string = "All Items";

  function updateCategory(category: string) {
    selectedCategory = category;
  }

  function navigateToCart() {
    goto('/Cart');
  }
</script>

<div class="container">
  <!-- Sidebar with category selection handler -->
  <Sidebar onCategorySelect={updateCategory} currentPage="ordering" />
  <div style="flex-grow: 1;">
    <Header currentPage="ordering" />
    <h2>{selectedCategory}</h2>
    <main>
      {#each Array(10) as _}
        <div class="item-card">
          <div class="cart-button">
            <button on:click={navigateToCart} class="cart-icon">🛒</button>
          </div>
        </div>
      {/each}
    </main>
  </div>
</div>
