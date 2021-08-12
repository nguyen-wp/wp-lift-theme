module.exports = function (gulp, $, browserSync) {
	gulp.task('tao-sass-admin', function () {
		let defaultNotification = function (err) {
			return {
				subtitle: err.plugin,
				message: err.message,
				sound: 'Funk',
				onLast: true,
			};
		};
		return gulp.src([
				'./admin/styles/**/*.sass',
				'./admin/styles/**/*.scss',
				'!./admin/styles/{**/\_*,**/\_*/**}'
			])
			.pipe($.sourcemaps.init())
			.pipe($.sass().on('error', function (err) {
				$.util.log(err);
			}).on('error', $.notify.onError(defaultNotification)))
			.pipe($.sourcemaps.write(''))
			.pipe(gulp.dest('./admin/dist/css'))
			.pipe(browserSync.stream())
	});
};
