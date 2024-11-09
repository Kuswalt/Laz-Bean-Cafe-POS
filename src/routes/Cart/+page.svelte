<!-- Cart.svelte -->
<script lang="ts">
    import { goto } from '$app/navigation';
    import Header from '../Utilities/Header.svelte';
    import Sidebar from '../Utilities/Sidebar.svelte';
    import './cart.css';
  
    let selectedCategory: string = "Your Orders";
  
    function updateCategory(category: string) {
      selectedCategory = category;
    }
  
    // Sample orders array for demonstration
    let orders = [
      { name: "Food Item 1", quantity: 1 },
      { name: "Food Item 2", quantity: 1 },
      { name: "Food Item 3", quantity: 1 },
    ];
  
    function incrementQuantity(order) {
      order.quantity++;
    }
  
    function decrementQuantity(order) {
      if (order.quantity > 1) {
        order.quantity--;
      }
    }
  </script>
  
  <div class="container">
    <Sidebar onCategorySelect={updateCategory} currentPage="cart" />
    <div style="flex-grow: 1;">
      <Header currentPage="cart" />
      <h2>{selectedCategory}</h2>
      <main>
        <div class="order-list">
          <!-- Display the list of food orders with quantity controls -->
          {#each orders as order}
            <div class="order-item">
              <span class="name">{order.name}</span>
              <div class="quantity-controls">
                <button on:click={() => incrementQuantity(order)} class="arrow-button">▲</button>
                <span class="quantity-display">{order.quantity}</span>
                <button on:click={() => decrementQuantity(order)} class="arrow-button">▼</button>
              </div>
              <button class="remove-button">Remove</button>
            </div>
          {/each}
        </div>
      </main>
    </div>
  </div>
  
