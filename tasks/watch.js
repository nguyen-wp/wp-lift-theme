module.exports = function (gulp, $, browserSync) {
	gulp.task('watch', function (done) {
		gulp.watch('./src/styles/**/*.*', gulp.series('tao-sass'));
		gulp.watch('./src/img/**/*.*', gulp.series('copy-img'));
		gulp.watch('./src/templates/**/*.*', gulp.series('tao-html'));
		gulp.watch('./src/scripts/**/*.*', gulp.series('tao-js', 'tao-js-tool'));
		gulp.watch("./dist/**/*.*").on('change', browserSync.reload);
		gulp.watch('./admin/styles/**/*.*', gulp.series('tao-sass-admin'));
		gulp.watch('./admin/scripts/**/*.*', gulp.series('tao-js-admin'));
		gulp.watch("./admin/**/*.*").on('change', browserSync.reload);
		done();
	});
};
