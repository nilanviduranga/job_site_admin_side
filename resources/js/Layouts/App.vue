<template>
    <div>
        <NavBar> </NavBar>

        <div class="mt-5">
            <slot name="content"> </slot>
        </div>

    </div>
</template>

<script>
import NavBar from '@/Components/Main/NavBar.vue'

export default {
    components: {
        NavBar
    }
}
</script>

<style lang="css" scoped></style>
