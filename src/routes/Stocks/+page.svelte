<script lang="ts">
    import { goto } from '$app/navigation';
    import Header from '../Utilities/Header.svelte';
    import Sidebar from '../Utilities/Sidebar.svelte';
    import './Stocks.css';

    let selectedCategory: string = 'All Item Stocks'; // Default display for initial load
    let productName = '';
    let description = '';
    let price = '';
    let stockQuantity = 0;

    function handleCategorySelect(category: string) {
        selectedCategory = category;
    }

    function navigateToCart() {
        goto('/Cart');
    }

    async function addItemStock() {
        const response = await fetch('http://localhost/Laz-Bean-Cafe-POS/api/routes.php?request=add-item-stock', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                product_id: productName,
                stock_quantity: stockQuantity,
            }),
        });
        const result = await response.json();
        console.log(result);
    }

    async function updateItemStock(inventoryId: number) {
        const response = await fetch('http://localhost/Laz-Bean-Cafe-POS/api/routes.php?request=update-item-stock', {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                inventory_id: inventoryId,
                stock_quantity: stockQuantity,
            }),
        });
        const result = await response.json();
        console.log(result);
    }

    async function deleteItemStock(inventoryId: number) {
        const response = await fetch('http://localhost/Laz-Bean-Cafe-POS/api/routes.php?request=delete-item-stock', {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                inventory_id: inventoryId,
            }),
        });
        const result = await response.json();
        console.log(result);
    }
</script>

<div class="container">
    <Sidebar onCategorySelect={handleCategorySelect} currentPage="home" />
    <div style="flex-grow: 1;">
        <Header currentPage="edit" />
        <h2>{selectedCategory}</h2>
        <main>
            <div class="product-details">
                <div class="details">
                    <input type="text" placeholder="Product name" bind:value={productName} />
                    <input type="text" placeholder="DESCRIPTION" bind:value={description} />
                    <input type="text" placeholder="PRICE" bind:value={price} />
                    <input type="number" placeholder="Quantity" bind:value={stockQuantity} />
                    <button on:click={addItemStock}>Confirm</button>
                    <button on:click={() => updateItemStock(1)}>Edit</button>
                    <button on:click={() => deleteItemStock(1)}>Delete</button>
                </div>
            </div>

            <!-- New table for displaying stock content -->
            <div class="stock-table">
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        {#each Array(3) as _, i}
                            <tr>
                                <td>Item {i + 1}</td>
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
