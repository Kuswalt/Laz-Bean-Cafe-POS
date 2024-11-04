<script lang="ts">
    import Sidebar from '../Utilities/Sidebar.svelte';
    import Modal from '../Utilities/Modal.svelte';
    import './Cart.css';

    let showModal = false;
    let categories = ["Pizza", "Burger", "Coffee", "Tea", "MilkTea"];
    let orders = Array(4).fill({ quantity: 0 });

    function toggleModal() {
        showModal = !showModal;
    }

    function addItem(index: number) {
        orders[index].quantity++;
    }

    function removeItem(index: number) {
        orders[index].quantity = Math.max(0, orders[index].quantity - 1);
    }

    function updateCategory(category: string) {
        console.log(`Selected category: ${category}`);
    }
</script>

<div class="layout">
    <Sidebar onToggleModal={toggleModal} onSelectCategory={updateCategory} />

    <main class="content">
        <div class="payment-bar">
            <button class="payment-button">Payment</button>
        </div>

        <div class="order-list">
            {#each orders as order, index}
                <div class="order-item">
                    <span>{index + 1}</span>
                    <button class="add-button" on:click={() => addItem(index)}>Add</button>
                    <button class="remove-button" on:click={() => removeItem(index)}>Remove</button>
                </div>
            {/each}
        </div>
    </main>

    <Modal bind:showModal={showModal} on:close={() => (showModal = false)} />
</div>

