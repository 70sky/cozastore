<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<!-- Filter -->
<div class="dis-none panel-filter w-full p-t-10">

	<form name="<? echo $arResult["FILTER_NAME"] . "_form" ?>" action="<? echo $arResult["FORM_ACTION"] ?>" method="get" class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
		<? foreach ($arResult["HIDDEN"] as $arItem) : ?>
			<input type="hidden" name="<? echo $arItem["CONTROL_NAME"] ?>" id="<? echo $arItem["CONTROL_ID"] ?>" value="<? echo $arItem["HTML_VALUE"] ?>" />
		<? endforeach; ?>
		<div class="filter-col1 p-r-15 p-b-27">
			<div class="mtext-102 cl2 p-b-15">
				Sort By
			</div>

			<ul>
				<li class="p-b-6">
					<span class="sort-link filter-link stext-106 trans-04 filter-link-active" onclick="smartFilter.click(this)" data-url="">
						Default
					</span>
				</li>

				<li class="p-b-6">
					<span class="sort-link filter-link stext-106 trans-04" onclick="smartFilter.click(this)" data-url="&sort=shows&method=desc">
						Popularity
					</span>
				</li>

				<li class="p-b-6">
					<span class="sort-link filter-link stext-106 trans-04" onclick="smartFilter.click(this)" data-url="&sort=timestamp_x&method=desc">
						Newness
					</span>
				</li>

				<li class="p-b-6">
					<span class="sort-link filter-link stext-106 trans-04" onclick="smartFilter.click(this)" data-url="&sort=SCALED_PRICE_1&method=asc">
						Price: Low to High
					</span>
				</li>

				<li class="p-b-6">
					<span class="sort-link filter-link stext-106 trans-04" onclick="smartFilter.click(this)" data-url="&sort=SCALED_PRICE_1&method=desc">
						Price: High to Low
					</span>
				</li>
			</ul>
			<script>
				$('.sort-link').click(function () { 
					$('.sort-link').removeClass('filter-link-active');
					$(this).addClass('filter-link-active');
					smartFilter.click(this);
				});
			</script>
		</div>
		<div class="filter-col2 p-r-15 p-b-27">
			<div class="mtext-102 cl2 p-b-15">
				Price
			</div>
			<? foreach ($arResult["ITEMS"] as $key => $arItem)
			//prices
			{
				$key = $arItem["ENCODED_ID"];
				if (isset($arItem["PRICE"])) :
					if ($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"] <= 0)
						continue;

					$step_num = 4;
					$step = ($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"]) / $step_num;
					$prices = array();

					for ($i = 0; $i < $step_num; $i++) {
						$prices[$i] = $arItem["VALUES"]["MIN"]["VALUE"] + $step * $i;
					}
					$prices[$step_num] = $arItem["VALUES"]["MAX"]["VALUE"];

			?>
					<ul>
						<input hidden type="text" name="<? echo $arItem["VALUES"]["MIN"]["CONTROL_NAME"] ?>" id="minPrice" value="" />
						<input hidden type="text" name="<? echo $arItem["VALUES"]["MAX"]["CONTROL_NAME"] ?>" id="maxPrice" value="" />
						<li class="p-b-6">
							<span class="price-link filter-link stext-106 trans-04 filter-link-active" onclick="priceInput('','');smartFilter.click(this)">
								All
							</span>
						</li>
						<? foreach ($prices as $key => $price) : ?>
							<li class="p-b-6">
								<?
								if ($key == 0) {
									$minPrice = 0;
								} else {
									$minPrice = rtrim($prices[$key - 1]);
								}
								$maxPrice = rtrim($price);
								?>
								<span class="price-link filter-link stext-106 trans-04" onclick="priceInput(<?= $minPrice ?>,<?= $maxPrice ?>);smartFilter.click(this)">
									&#8381;<?= $minPrice ?> - &#8381;<?= $maxPrice ?>
								</span>
							</li>
						<? endforeach ?>
					</ul>

					<script>
						$('.price-link').click(function () { 
							$('.price-link').removeClass('filter-link-active');
							$(this).addClass('filter-link-active');
						});
						function priceInput(min, max) {
							$('#minPrice').val(min);
							$('#maxPrice').val(max);
						}
					</script>
			<? endif;
			} ?>
		</div>
		<div class="filter-col3 p-r-15 p-b-27">
			<div class="mtext-102 cl2 p-b-15">
				Color
			</div>
			<ul>
				<?
				$color["Черный"] = "#222;"; 
				$color["Синий"] = "#4272d7;"; 
				$color["Серый"] = "#b3b3b3;"; 
				$color["Зеленый"] = "#00ad5f;"; 
				$color["Красный"] = "#fa4251;"; 
				$color["Белый"] = "#aaa;"; 
				?>
				<?foreach($arResult["ITEMS"]["4"]["VALUES"] as $val => $ar):?>
					<li class="p-b-6">
						<input
							hidden
							type="checkbox"
							value="<? echo $ar["HTML_VALUE"] ?>"
							name="<? echo $ar["CONTROL_NAME"] ?>"
							id="<? echo $ar["CONTROL_ID"] ?>"
							<? echo $ar["CHECKED"]? 'checked="checked"': '' ?>
						/>
						
						<label for="<? echo $ar["CONTROL_ID"] ?>" data-role="label_<?=$ar["CONTROL_ID"]?>" style="margin: 0px;">
							<span class="fs-15 lh-12 m-r-6" style="color: <?=$color[$ar["VALUE"]]?>">
								<i class="zmdi zmdi-circle"></i>
							</span>
							<span class="color-link filter-link stext-106 trans-04 <? echo $ar["CHECKED"]? 'filter-link-active': '' ?>">
								<?=$ar["VALUE"];?>
							</span>
						</label>
					</li>
				<?endforeach;?>
				<script>
					$('.color-link').click(function () { 

						smartFilter.click(this);
						$(this).toggleClass('filter-link-active');
					});
				</script>
			</ul>
		</div>

		<div class="filter-col4 p-b-27">
			<div class="mtext-102 cl2 p-b-15">
				Tags
			</div>
			
			<div class="flex-w p-t-4 m-r--5">
				<?foreach($arResult["ITEMS"]["12"]["VALUES"] as $val => $ar):?>
					<input
						hidden
						type="checkbox"
						value="<? echo $ar["HTML_VALUE"] ?>"
						name="<? echo $ar["CONTROL_NAME"] ?>"
						id="<? echo $ar["CONTROL_ID"] ?>"
						<? echo $ar["CHECKED"]? 'checked="checked"': '' ?>
					/>
					<label for="<? echo $ar["CONTROL_ID"] ?>" data-role="label_<?=$ar["CONTROL_ID"]?>" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5 label-item <? echo $ar["CHECKED"]? 'label-active': '' ?>"><?=$ar["VALUE"];?></label>
				<?endforeach;?>
			</div>
			<script>
				$('.label-item').click(function () { 

					smartFilter.click(this);
					$(this).toggleClass('label-active');
				});
			</script>
		</div>			
		<div class="bx-filter-popup-result <?if ($arParams["FILTER_VIEW_MODE"] == "VERTICAL") echo $arParams["POPUP_POSITION"]?>" id="modef" <?if(!isset($arResult["ELEMENT_COUNT"])) echo 'style="display:none"';?> style="display: inline-block;">
			<?echo GetMessage("CT_BCSF_FILTER_COUNT", array("#ELEMENT_COUNT#" => '<span id="modef_num">'.intval($arResult["ELEMENT_COUNT"]).'</span>'));?>
			<span class="arrow"></span>
			<br/>
			<a href="<?echo $arResult["FILTER_URL"]?>" target=""><?echo GetMessage("CT_BCSF_FILTER_SHOW")?></a>
		</div>
						
	</form>

</div>
<script type="text/javascript">
	var smartFilter = new JCSmartFilter('<?echo CUtil::JSEscape($arResult["FORM_ACTION"])?>', '<?=CUtil::JSEscape($arParams["FILTER_VIEW_MODE"])?>', <?=CUtil::PhpToJSObject($arResult["JS_FILTER_PARAMS"])?>);
</script>