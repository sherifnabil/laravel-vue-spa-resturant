<template>
   <div class="section">
        <table class="table table-hovered table-bordered table-striped">
            <thead>
                <tr>
                    <td>Name &amp; Descrription</td>
                    <td>Price</td>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item, key) in menus" :item="item"  :key="key">
                    <td>
                        <strong v-text="item.name"></strong>
                        <p v-text="item.description"></p>
                    </td>
                    <td><strong v-text="item.price"></strong></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    props: ['menus']
}
</script>