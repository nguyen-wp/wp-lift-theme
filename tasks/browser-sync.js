module.exports = function (gulp, $, browserSync) {
	gulp.task('browser-sync', function () {
		browserSync.init({
			// SERVER  
			// server: {
			// 	baseDir: "./dist"
			// },
			// LOCALHOST DEV 
			proxy: {
				target: "http://demo.local:8888",
				ws: true
			}
		});
	});
};
