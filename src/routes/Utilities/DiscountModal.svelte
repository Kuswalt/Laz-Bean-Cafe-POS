<script lang="ts">
    import { createEventDispatcher } from 'svelte';

    export let showModal: boolean;
    export let customDiscount = '';
    
    const dispatch = createEventDispatcher();

    function closeModal() {
        dispatch('close');
    }

    function addDiscount() {
        // Add discount logic here
    }

    function removeDiscount() {
        // Remove discount logic here
    }
</script>

{#if showModal}
    <div class="modal">
        <button on:click={closeModal}>Close</button>
        <input type="text" placeholder="Custom Discount Amount" bind:value={customDiscount} />
        <button class="modal-btn" on:click={addDiscount}>Add</button>
        <button class="modal-btn" on:click={removeDiscount}>Remove</button>
    </div>
{/if}

<style>
    .modal {
    position: fixed;
    left: 220px;
    top: 5%;
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
