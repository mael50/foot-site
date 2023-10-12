<template>
    <div class="container">
        <Sidebar />
        <div class="main-content">
            <slot />

        </div>
    </div>
</template>

<style>
html, body {
    margin: 0;
    padding: 0;
    font-family: Arial, Helvetica, sans-serif;
    background-color: #ffffff;
}

.container {
    display: grid;
    grid-template-columns: auto 1fr;
    height: 100vh;
}

.main-content {
    overflow-y: auto;
    padding: 20px;
    margin: 30px;
}
</style>


