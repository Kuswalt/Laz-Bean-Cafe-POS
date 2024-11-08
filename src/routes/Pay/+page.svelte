<script lang="ts">
    import Header from '../Utilities/Header.svelte';
    import Sidebar from '../Utilities/Sidebar.svelte';
    import './pay.css';
    let selectedCategory: string = "Your Orders";
  
    function updateCategory(category: string) {
      selectedCategory = category;
    }
  </script>
  
  <div class="container">
    <Sidebar onCategorySelect={updateCategory} currentPage="pay" />
    <div class="main-content">
      <Header currentPage="pay" />
      <h2>{selectedCategory}</h2>
      <main>
        <div class="order-summary">
          <div class="item-total">Item Total</div>
          <div class="items">
            {#each Array(6) as _}
              <div class="item-line"></div>
            {/each}
          </div>
          <div class="item-total">Item Total</div>
        </div>
      </main>
    </div>
  </div>
  