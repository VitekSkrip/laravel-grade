<template>
    <Transition name="fade">
        <div
            v-if="showing"
            @click.self="close"
        >
            <slot />
        </div>
    </Transition>
</template>

<script>
export default {
    props: {
        showing: {
            required: true,
            type: Boolean
        }
    },
    watch: {
        showing(value) {
            if (value) {
                return document.querySelector('body').classList.add('overflow-hidden');
            }

            document.querySelector('body').classList.remove('overflow-hidden');
        }
    },
    methods: {
        close() {
            this.$emit('close');
        }
    }
}
</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition: all 0.4s;
}
.fade-enter,
.fade-leave-to {
    opacity: 0;
}
</style>
