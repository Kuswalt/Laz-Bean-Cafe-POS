<script lang="ts">
    import { createEventDispatcher } from 'svelte';

    export let showModal: boolean;
    export let voucherID = '';
    
    const dispatch = createEventDispatcher();

    function closeModal() {
        dispatch('close');
    }

    function addVoucher() {
        // Add voucher logic here
    }

    function removeVoucher() {
        // Remove voucher logic here
    }
</script>

{#if showModal}
    <div class="modal">
        <button on:click={closeModal}>Close</button>
        <input type="text" placeholder="Insert Voucher ID" bind:value={voucherID} />
        <button class="modal-btn" on:click={addVoucher}>Add</button>
        <button class="modal-btn" on:click={removeVoucher}>Remove</button>
    </div>
{/if}

<style>
   .modal {
    position: fixed;
    left: 220px;
    top: 10%;
    background-color: #e0e0e0;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.1);
    padding: 10px;
    display: flex;
    flex-direction: column;
    gap: 5px;
}

    .modal button, .modal input {
        background-color: #d3d3d3;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        padding: 10px;
        width: 100%;
    }
</style>
