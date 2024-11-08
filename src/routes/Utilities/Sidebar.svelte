<script lang="ts">
  import { goto } from '$app/navigation';

  export let onCategorySelect: (category: string) => void;
  export let currentPage: string;

  function navigateToPayment() {
    goto('/Pay');
  }

</script>

<style>
  aside {
    position: sticky;
    top: 0;
    z-index: 2000;
    height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 200px;
    padding: 10px;
    background-color: #d1a15d;
  }

  .icon {
    width: 50px;
    height: 50px;
    background-color: #d3d3d3;
    border-radius: 50%;
    margin-bottom: 20px;
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  ul {
    list-style: none;
    padding: 0;
    width: 100%;
  }

  li {
    margin: 10px 0;
    text-align: center;
    background-color: #fff;
    padding: 10px;
    border-radius: 5px;
    cursor: pointer;
  }

  .checkout-button {
    background-color: #fff;
    padding: 10px;
    border-radius: 5px;
    cursor: pointer;
    text-align: center;
    margin-top: 20px;
  }
</style>

<aside>
  <div class="icon">A</div>

  {#if currentPage === 'pay'}
    <button class="checkout-button" on:click={null}>Check Out</button>
  {:else if currentPage === 'cart'}
    <button on:click={navigateToPayment}>Payment</button>
  {:else}
    <ul>
      <li on:click={() => onCategorySelect("All Items")}>All Items</li>
      <li on:click={() => onCategorySelect("Pizza")}>Pizza</li>
      <li on:click={() => onCategorySelect("Burgers")}>Burgers</li>
      <li on:click={() => onCategorySelect("Milktea")}>Milktea</li>
      <li on:click={() => onCategorySelect("Yakult Mix")}>Yakult Mix</li>
      <li on:click={() => onCategorySelect("Fries")}>Fries</li>
    </ul>
  {/if}
</aside>

