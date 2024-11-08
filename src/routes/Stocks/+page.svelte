<script lang="ts">
    import { goto } from '$app/navigation';
    import Header from '../Utilities/Header.svelte';
    import Sidebar from '../Utilities/Sidebar.svelte';
    import './Stocks.css';
    let selectedCategory: string = 'All Item Stocks'; // Default display for initial load

    function handleCategorySelect(category: string) {
    selectedCategory = category;
  }

    function navigateToCart() {
      goto('/Cart');
    }
</script>

<div class="container">
    <Sidebar onCategorySelect={handleCategorySelect} currentPage="home" />
    <div style="flex-grow: 1;">
        <Header currentPage="edit" />
        <h2>{selectedCategory}</h2>
        <main>
            <div class="product-details">
                <div class="image">IMAGE</div>
                <div class="details">
                    <input type="text" placeholder="Product name" />
                    <input type="text" placeholder="DESCRIPTION" />
                    <input type="text" placeholder="PRICE" />
                    <button>Confirm</button>
                    <button>Edit</button>
                    <button>Delete</button>
                </div>
            </div>

            <!-- New table for displaying stock content -->
            <div class="stock-table">
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        {#each Array(3) as _, i}
                            <tr>
                                <td>Item {i + 1}</td>
                                <td>$0.00</td>
                                <td>Description {i + 1}</td>
                                <td>0</td>
                            </tr>
                        {/each}
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
