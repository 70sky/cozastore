<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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

$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));
?>
<?/*
<div class="flex-w flex-l-m filter-tope-group m-tb-10">
	<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 <?if(!$_REQUEST["SECTION_CODE"]):?>how-active1<?endif?>" data-filter="*">
		All Products
	</button>
	<?foreach ($arResult["SECTIONS"] as $section): ?>
		<?
			$this->AddEditAction($section['ID'], $section['EDIT_LINK'], $strSectionEdit);
			$this->AddDeleteAction($section['ID'], $section['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
		?>		
		<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 
		<?if($_REQUEST["SECTION_CODE"] == $section["CODE"]):?>how-active1<?endif?>" data-filter="*" id="<?=$this->GetEditAreaId($arSection['ID'])?>">
			<?=$section["NAME"]?>
		</button>
	<?endforeach?>
	
</div>*/?>

<!-- Banner -->
<div class="sec-banner bg0 p-t-80 p-b-50">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
				<!-- Block1 -->
				<div class="block1 wrap-pic-w">
					<img src="<?=SITE_TEMPLATE_PATH?>/assets/images/banner-01.jpg" alt="IMG-BANNER">

					<a href="product.html" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
						<div class="block1-txt-child1 flex-col-l">
							<span class="block1-name ltext-102 trans-04 p-b-8">
								Women
							</span>

							<span class="block1-info stext-102 trans-04">
								Spring 2018
							</span>
						</div>

						<div class="block1-txt-child2 p-b-4 trans-05">
							<div class="block1-link stext-101 cl0 trans-09">
								Shop Now
							</div>
						</div>
					</a>
				</div>
			</div>

			<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
				<!-- Block1 -->
				<div class="block1 wrap-pic-w">
					<img src="<?=SITE_TEMPLATE_PATH?>/assets/images/banner-02.jpg" alt="IMG-BANNER">

					<a href="product.html" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
						<div class="block1-txt-child1 flex-col-l">
							<span class="block1-name ltext-102 trans-04 p-b-8">
								Men
							</span>

							<span class="block1-info stext-102 trans-04">
								Spring 2018
							</span>
						</div>

						<div class="block1-txt-child2 p-b-4 trans-05">
							<div class="block1-link stext-101 cl0 trans-09">
								Shop Now
							</div>
						</div>
					</a>
				</div>
			</div>

			<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
				<!-- Block1 -->
				<div class="block1 wrap-pic-w">
					<img src="<?=SITE_TEMPLATE_PATH?>/assets/images/banner-03.jpg" alt="IMG-BANNER">

					<a href="product.html" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
						<div class="block1-txt-child1 flex-col-l">
							<span class="block1-name ltext-102 trans-04 p-b-8">
								Accessories
							</span>

							<span class="block1-info stext-102 trans-04">
								New Trend
							</span>
						</div>

						<div class="block1-txt-child2 p-b-4 trans-05">
							<div class="block1-link stext-101 cl0 trans-09">
								Shop Now
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>