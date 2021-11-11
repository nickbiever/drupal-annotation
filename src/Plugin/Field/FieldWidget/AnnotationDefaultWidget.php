<?php
	namespace Drupal\annotation\Plugin\Field\FieldWidget;

	use Drupal\Core\Field\WidgetBase;
	use Drupal\Core\Field\WidgetInterface;
	use Drupal\Core\Field\FieldItemListInterface;
	use Drupal\Core\Form\FormStateInterface;

	/**
	 * @FieldWidget(
	 * 	id = "annotation_default",
	 * 	label = @Translation("Annotation default"),
	 * 	field_types = {
	 * 		"annotation",
	 * 	}
	 * )
	 */
	class AnnotationDefaultWidget extends WidgetBase implements WidgetInterface {
		public function formElement(FieldItemListInterface $items, $index, array $element, array &$form, FormStateInterface $form_state) {
			$item =& $items[$index];

			$element["annotation"] = array (
				"#title" => t("Annotation"),
				"#type" => "textarea",
				"#default_value" => isset($item->annotation) ? $item->annotation : "",
			);

			return $element;
		}
	}
?>