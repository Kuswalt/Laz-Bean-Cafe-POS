<script lang="ts">
    import { goto } from '$app/navigation';
    import Header from '../Utilities/Header.svelte';
    import Sidebar from '../Utilities/Sidebar.svelte';
    import './edit.css';
    let selectedCategory: string = "All Items";
  
    function updateCategory(category: string) {
      selectedCategory = category;
    }
  
    function navigateToCart() {
      goto('/Cart', { replaceState: true });
    }
  </script>
  
<div class="container">
    <Sidebar   onCategorySelect={updateCategory} actions={['Add', 'Edit', 'Delete']} currentPage="edit" />
    <div style="flex-grow: 1;">
        <Header currentPage="edit" />
        <h2>{selectedCategory}</h2>
        <main>
            <div class="product-details">
                <div class="image">IMAGE</div>
                <div class="details">
                    <input type="text" placeholder="Product name" />
                    <input type="text" placeholder="DESCRIPT" />
                    <input type="text" placeholder="PRICE" />
                    <button>Confirm</button>
                </div>
            </div>
            <div class="it">
                {#each Array(3) as _}
                    <div class="item-card">
                        <div class="cart-button">
                            <button on:click={navigateToCart} class="cart-icon">🛒</button>
                        </div>
                    </div>
                {/each}
            </div>
        </main>
    </div>
</div>
  