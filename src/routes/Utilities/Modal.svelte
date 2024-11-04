<script lang="ts">
    import { createEventDispatcher } from 'svelte';
    import { goto } from '$app/navigation'; 

    export let showModal: boolean;
  
    const dispatch = createEventDispatcher();
  
    function closeModal() {
        dispatch('close'); 
    }

    function navigateToStocks() {
        goto('/Stocks');
    }

    function navigateToSales() {
        goto('/Sales');
    }

    function logout() {
        goto('/');
    }
</script>
  
{#if showModal}
    <div class="modal">
        <button on:click={navigateToStocks}>STOCKS</button>
        <button on:click={navigateToSales}>SALES</button>
        <button on:click={logout}>LOGOUT</button>
        <button on:click={closeModal}>Close</button>
    </div>
{/if}

<style>
    .modal {
        position: fixed;
        bottom: 20px;
        left: 220px; 
        background-color: #e0e0e0;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.1);
        padding: 10px;
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    .modal button {
        background-color: #d3d3d3;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        padding: 10px;
        width: 100%;
    }
</style>
