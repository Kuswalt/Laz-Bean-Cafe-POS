<script lang="ts">
    import Sidebar from '../Utilities/Sidebar.svelte';
    import Modal from '../Utilities/Modal.svelte';
    import './Ordering.css';

  
    let showModal: boolean = false;
    let selectedCategory: string = 'All Items';
    let items = Array(8).fill(null).map((_, index) => `/path/to/image${index + 1}.jpg`);
    let isEditMode: boolean = false;
    let cart: string[] = [];
  
    function toggleModal() {
      showModal = !showModal;
    }
  
    function updateCategory(category: string) {
      selectedCategory = category;
    }

    function addItem() {
        const newItem = prompt("Enter new item image path:");
        if (newItem) {
            items = [...items, newItem];
        }
    }

    function deleteItem(index: number) {
        items = items.filter((_, i) => i !== index);
    }

    function addToCart(item: string) {
        cart = [...cart, item];
        alert(`Added to cart: ${item}`);
    }

    function removeFromCart(item: string) {
        cart = cart.filter(cartItem => cartItem !== item);
        alert(`Removed from cart: ${item}`);
    }
</script>

<div class="container">
    <Sidebar onToggleModal={toggleModal} onSelectCategory={updateCategory} on:editModeChange={(e) => isEditMode = e.detail} />
  
    <div class="content">
        <div class="top-bar">
            <div class="all-items">{selectedCategory}</div>
            <div class="cart-button">
                <a href="/Cart">🛒 {cart.length}</a>
            </div>
        </div>
  
        <div class="items-flex">
            {#each items as item, index}
                <div class="item-container">
                    <img src={item} alt="Item" class="item" />
                    <div class="button-column">
                        <button on:click={() => addToCart(item)}>Add to Cart</button>
                        <button on:click={() => removeFromCart(item)}>Remove from Cart</button>
                    </div>
                    {#if isEditMode}
                        <button class="delete-button" on:click={() => deleteItem(index)}>Delete</button>
                    {/if}
                </div>
            {/each}
        </div>
        {#if isEditMode}
            <button class="add-item-button" on:click={addItem}>Add Item</button>
        {/if}
    </div>
  
    <Modal bind:showModal={showModal} on:close={() => (showModal = false)} />
</div>
