module.exports = function (gulp, $, browserSync) {
	gulp.task('copy-css', function () {
		return gulp.src([
				'./src/css/**.*',
			])
			.pipe(gulp.dest('./dist/css'));
	});
};
