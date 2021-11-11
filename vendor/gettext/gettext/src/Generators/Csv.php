<?php

namespace Gettext\Generators;

use Gettext\Translations;
use Gettext\Utils\HeadersGeneratorTrait;
use Gettext\Utils\CsvTrait;

/**
 * Class to export translations to csv.
 */
class Csv extends Generator implements GeneratorInterface {

	use HeadersGeneratorTrait;
	use CsvTrait;

	public static $options = array(
		'includeHeaders' => false,
		'delimiter'      => ',',
		'enclosure'      => '"',
		'escape_char'    => '\\',
	);

	/**
	 * {@parentDoc}.
	 */
	public static function toString( Translations $translations, array $options = array() ) {
		$options += static::$options;
		$handle   = fopen( 'php://memory', 'w' );

		if ( $options['includeHeaders'] ) {
			static::fputcsv( $handle, array( '', '', static::generateHeaders( $translations ) ), $options );
		}

		foreach ( $translations as $translation ) {
			if ( $translation->isDisabled() ) {
				continue;
			}

			$line = array( $translation->getContext(), $translation->getOriginal(), $translation->getTranslation() );

			if ( $translation->hasPluralTranslations( true ) ) {
				$line = array_merge( $line, $translation->getPluralTranslations() );
			}

			static::fputcsv( $handle, $line, $options );
		}

		rewind( $handle );
		$csv = stream_get_contents( $handle );
		fclose( $handle );

		return $csv;
	}
}
