<script lang="ts">
    import './pay.css';
    import { goto } from '$app/navigation';
    import DiscountModal from '../Utilities/DiscountModal.svelte';
    import VoucherModal from '../Utilities/VoucherModal.svelte';
    import Modal from '../Utilities/Modal.svelte';

    let customDiscount = '';
    let voucherID = '';
    let items = Array(8).fill({ name: 'Item', price: '0.00' });
    let itemTotal = 0;

    // Modals state
    let showDiscountModal = false;
    let showVoucherModal = false;
    let showLayersModal = false;

    function addDiscount() {
        // Discount logic here
    }
    
    function removeDiscount() {
        // Discount removal logic here
    }
    
    function addVoucher() {
        // Voucher logic here
    }
    
    function removeVoucher() {
        // Voucher removal logic here
    }
    
    function viewSales() {
        // View sales logic here
    }
    
    function viewStock() {
        // View stock logic here
    }
    
    function logout() {
        // Logout logic here
    }
</script>

<div class="container">
    <div class="sidebar">
        <div class="profile">
            <span>A</span>
        </div>
        <button class="sidebar-btn" on:click={() => (showDiscountModal = true)}>Add Discount</button>
        <button class="sidebar-btn" on:click={() => (showVoucherModal = true)}>Add Voucher</button>
        <button class="sidebar-btn" on:click={() => goto('/Ordering')}>Menu</button>
        <button class="sidebar-btn" on:click={() => goto('/Cart')}>Cart</button>
        <!-- Layers modal activation button -->
        <button class="menu-icon" on:click={() => (showLayersModal = true)} aria-label="Toggle Layers Modal"></button>
    </div>
    
    <div class="content">
        <div class="header">Item Total</div>
        <div class="item-list">
            {#each items as item}
                <div class="item">
                    <span>{item.name}</span>
                    <span>{item.price}</span>
                </div>
            {/each}
        </div>
        <div class="footer">
        <h1 class="footer-button">Item Total</h1>
        </div>
    </div>

    <!-- Modals -->
    <DiscountModal bind:showModal={showDiscountModal} bind:customDiscount on:close={() => (showDiscountModal = false)} />
    
    <VoucherModal bind:showModal={showVoucherModal} bind:voucherID on:close={() => (showVoucherModal = false)} />
    
    <Modal bind:showModal={showLayersModal} on:close={() => (showLayersModal = false)} />
</div>
