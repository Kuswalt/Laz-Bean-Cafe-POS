<script lang="ts">
    import './Stocks.css';
    import Sidebar from '../Utilities/Sidebar.svelte';
    import Modal from '../Utilities/Modal.svelte';

    let showModal = false;

    function toggleModal() {
        showModal = !showModal;
    }

    function selectCategory(category: string) {
        console.log(`Selected category: ${category}`);
        // Handle category selection (e.g., fetch data for selected category)
    }
</script>

<div class="page-container">
    <Sidebar onToggleModal={toggleModal} onSelectCategory={selectCategory} />
    
    <div class="content">
        <h2>Stock List</h2>
        
        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Product Date of Arrival</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                <!-- Sample rows; replace with dynamic data as needed -->
                <tr>
                    <td>Sample Product 1</td>
                    <td>2024-01-01</td>
                    <td>100</td>
                </tr>
                <tr>
                    <td>Sample Product 2</td>
                    <td>2024-02-01</td>
                    <td>50</td>
                </tr>
            </tbody>
        </table>
    </div>

    <Modal showModal={showModal} on:close={toggleModal} />
</div>
