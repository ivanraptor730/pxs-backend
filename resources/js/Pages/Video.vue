<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Video
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="card card-body shadow-sm">
                   <video-player :options="videoOptions"/>
                </div>
            </div>
        </div>
    </app-layout>
</template>
<script>
    import AppLayout from '@/Layouts/AppLayout'
    import VideoPlayer from "@/components/VideoPlayer.vue";

    export default {
	name: "VideoExample",
	components: {
        VideoPlayer,
        AppLayout
	},
	data() {
		return {
			videoOptions: {
				autoplay: false,
				controls: true,
				sources: [
					{
						src:
						"/videos/s8intro.mp4",
						type: "video/mp4"
					}
                ],
                poster: "http://placehold.it/380?text=DMAX Video 2"
			}
		};
	}
};
    

</script>
