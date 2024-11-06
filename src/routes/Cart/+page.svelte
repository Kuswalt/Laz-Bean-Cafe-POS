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
          <a href="/Pay">  <button class="payment-button">Payment</button></a>
        </div>

        <div class="order-list">
            {#each orders as order, index}
                <div class="order-item">
                    <span class="item-counter">{index + 1}</span>
                    <div class="controls">
                        <div class="quantity-controls">
                            <button class="arrow-button" on:click={() => addItem(index)}>
                                <img src="/Arrow up-circle.png" alt="Up Arrow" class="arrow-icon">
                            </button>
                            <span class="quantity">{order.quantity}</span>
                            <button class="arrow-button" on:click={() => removeItem(index)}>
                                <img src="/Arrow down-circle.png" alt="Down Arrow" class="arrow-icon">
                            </button>
                        </div>
                        <button class="remove-button" on:click={() => removeItem(index)}>Remove</button>
                    </div>
                </div>
            {/each}
        </div>
        
        
    </main>

    <Modal bind:showModal={showModal} on:close={() => (showModal = false)} />
</div>

