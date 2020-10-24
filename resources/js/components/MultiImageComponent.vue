
<template>
    <div class="container">
        <div class="row justify-content-center mb-3" ref="imageUpload">
            <div class="col-12 md-3 py-3 text-center text-info">Drop Image here</div>
        </div>
    </div>
</template>
<style scoped>

</style>

<script>
import Dropzone from 'dropzone'

export default {

    // name: "MultiImageComponent",

    data : function () {
        return {
            dropzone: null
        }
    },
    mounted() {
        this.dropzone = new Dropzone(this.$refs.imageUpload, {
            url: '/images'
        });
    }
}
</script>
