<?php
	namespace Drupal\annotation\Plugin\Field\FieldType;

	use Drupal\Core\TypedData\DataDefinition;
	use Drupal\Core\Field\FieldItemInterface;
	use Drupal\Core\Field\FieldStorageDefinitionInterface;
	use Drupal\Core\Field\FieldItemBase;

	/**
	 * @FieldType(
	 *   id = "annotation",
	 *   label = @Translation("Annotation"),
	 *   description = @Translation("Annotation field."),
	 *   category = @Translation("Custom"),
	 *   default_widget = "annotation_default",
	 * )
	 */
	class AnnotationItem extends FieldItemBase implements FieldItemInterface {
		public static function schema(FieldStorageDefinitionInterface $field_definition) {
			$output['columns']['annotation'] = array(
				'type' => 'varchar',
				'length' => 255,
			  );

			  return $output;
		}

		public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
			$properties["annotation"] = DataDefinition::create("string")
				->setLabel(t("Annotation"))
				->setRequired(FALSE);

			return $properties;
		}

		public function isEmpty() {
			$item = $this->getValue();

			$has_items = FALSE;

			if (isset($item["annotation"]) && !empty($item["annotation"])) {
				$has_items = TRUE;
			}

			return !$has_items;
		}
	}
?>