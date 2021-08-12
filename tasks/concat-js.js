module.exports = function (gulp, $, browserSync) {
	gulp.task('concat-js', function () {
		return gulp.src([
				'node_modules/jquery/dist/jquery.min.js',
				'node_modules/bootstrap/dist/js/bootstrap.bundle.min.js',
				// Phần Plugins
				'bower_components/owl.carousel/dist/owl.carousel.min.js',
				'bower_components/fancybox/dist/jquery.fancybox.min.js',
			])
			.pipe($.concat('lift.js'))
			.pipe(gulp.dest('./dist/js'));
	});
};
