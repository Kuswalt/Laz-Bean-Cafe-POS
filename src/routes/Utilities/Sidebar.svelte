<script lang="ts">
    import { createEventDispatcher } from 'svelte';
    export let onToggleModal: () => void;
    export let onSelectCategory: (category: string) => void;
  
    let categories = ['All Items', 'Pizza', 'Coffee', 'Tea', 'MilkTea', 'Burgers'];
    let isEditMode = false;
    const dispatch = createEventDispatcher();

    function selectCategory(category: string) {
        onSelectCategory(category);
    }

    function toggleEditMode() {
        isEditMode = !isEditMode;
        dispatch('editModeChange', isEditMode);
    }

    function addItem() {
        const newItem = prompt("Enter new category name:");
        if (newItem) {
            categories = [...categories, newItem];
        }
    }

    function deleteItem(category: string) {
        categories = categories.filter(item => item !== category);
    }
</script>
  
<div class="sidebar">
    <div class="profile">A</div>
    {#each categories as category}
      <button class="category-button" on:click={() => selectCategory(category)}>
        {category}
        {#if isEditMode}
          <button on:click={() => deleteItem(category)}>Delete</button>
        {/if}
      </button>
    {/each}

    {#if isEditMode}
      <button class="category-button" on:click={addItem}>Add</button>
    {/if}

    <button class="menu-icon" on:click={onToggleModal} style="background-image: url('/Layers.png');" aria-label="Toggle Modal"></button>
    <button class="category-button" on:click={toggleEditMode}>{isEditMode ? 'Close Edit' : 'Edit'}</button>
</div>

<style>
    .sidebar {
        background-color: #e0e0e0;
        padding: 20px;
        width: 200px;
        display: flex;
        flex-direction: column;
        align-items: center;
        position: fixed;
        left: 0;
        height: 100%;
        top: 0;
    }

    .profile {
        width: 50px;
        height: 50px;
        background-color: #ffffff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        margin-bottom: 20px;
    }

    .category-button {
        background-color: #fff;
        border: none;
        padding: 10px;
        margin-bottom: 10px;
        cursor: pointer;
        width: 100%;
        text-align: center;
        position: relative;
    }

    .category-button button {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        background-color: red;
        color: white;
        border: none;
        cursor: pointer;
    }

    .menu-icon {
        margin-top: auto;
        cursor: pointer;
        width: 50px;
        height: 50px;
        background-size: cover;
        background-position: center;
    }
</style>
