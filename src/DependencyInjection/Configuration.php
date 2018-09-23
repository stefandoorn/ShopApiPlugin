<?php

declare(strict_types=1);

namespace Sylius\ShopApiPlugin\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

final class Configuration implements ConfigurationInterface
{
    /** {@inheritdoc} */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('shop_api');

        $this->buildIncludedAttributesNode($rootNode);
        $this->buildViewClassesNode($rootNode);

        return $treeBuilder;
    }

    private function buildIncludedAttributesNode(ArrayNodeDefinition $rootNode): void
    {
        $rootNode
            ->children()
                ->arrayNode('included_attributes')
                    ->prototype('scalar')->end()
                ->end()
            ->end()
        ;
    }

    private function buildViewClassesNode(ArrayNodeDefinition $rootNode): void
    {
        $rootNode
            ->addDefaultsIfNotSet()
            ->children()
                ->arrayNode('view_classes')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('address')->defaultValue(\Sylius\ShopApiPlugin\View\AddressView::class)->end()
                        ->scalarNode('address_book')->defaultValue(\Sylius\ShopApiPlugin\View\AddressBookView::class)->end()
                        ->scalarNode('adjustment')->defaultValue(\Sylius\ShopApiPlugin\View\AdjustmentView::class)->end()
                        ->scalarNode('cart_item')->defaultValue(\Sylius\ShopApiPlugin\View\ItemView::class)->end()
                        ->scalarNode('cart_summary')->defaultValue(\Sylius\ShopApiPlugin\View\CartSummaryView::class)->end()
                        ->scalarNode('customer')->defaultValue(\Sylius\ShopApiPlugin\View\CustomerView::class)->end()
                        ->scalarNode('estimated_shipping_cost')->defaultValue(\Sylius\ShopApiPlugin\View\EstimatedShippingCostView::class)->end()
                        ->scalarNode('image')->defaultValue(\Sylius\ShopApiPlugin\View\ImageView::class)->end()
                        ->scalarNode('page')->defaultValue(\Sylius\ShopApiPlugin\View\PageView::class)->end()
                        ->scalarNode('page_links')->defaultValue(\Sylius\ShopApiPlugin\View\PageLinksView::class)->end()
                        ->scalarNode('payment')->defaultValue(\Sylius\ShopApiPlugin\View\PaymentView::class)->end()
                        ->scalarNode('payment_method')->defaultValue(\Sylius\ShopApiPlugin\View\PaymentMethodView::class)->end()
                        ->scalarNode('price')->defaultValue(\Sylius\ShopApiPlugin\View\PriceView::class)->end()
                        ->scalarNode('product')->defaultValue(\Sylius\ShopApiPlugin\View\ProductView::class)->end()
                        ->scalarNode('product_attribute_value')->defaultValue(\Sylius\ShopApiPlugin\View\ProductAttributeValueView::class)->end()
                        ->scalarNode('product_review')->defaultValue(\Sylius\ShopApiPlugin\View\ProductReviewView::class)->end()
                        ->scalarNode('product_taxon')->defaultValue(\Sylius\ShopApiPlugin\View\ProductTaxonView::class)->end()
                        ->scalarNode('product_variant')->defaultValue(\Sylius\ShopApiPlugin\View\ProductVariantView::class)->end()
                        ->scalarNode('shipment')->defaultValue(\Sylius\ShopApiPlugin\View\ShipmentView::class)->end()
                        ->scalarNode('shipping_method')->defaultValue(\Sylius\ShopApiPlugin\View\ShippingMethodView::class)->end()
                        ->scalarNode('taxon')->defaultValue(\Sylius\ShopApiPlugin\View\TaxonView::class)->end()
                        ->scalarNode('taxon_details')->defaultValue(\Sylius\ShopApiPlugin\View\TaxonDetailsView::class)->end()
                        ->scalarNode('totals')->defaultValue(\Sylius\ShopApiPlugin\View\TotalsView::class)->end()
                        ->scalarNode('validation_error')->defaultValue(\Sylius\ShopApiPlugin\View\ValidationErrorView::class)->end()
                        ->scalarNode('variant_option')->defaultValue(\Sylius\ShopApiPlugin\View\VariantOptionView::class)->end()
                        ->scalarNode('variant_option_value')->defaultValue(\Sylius\ShopApiPlugin\View\VariantOptionValueView::class)->end()
                    ->end()
                ->end()
            ->end()
        ;
    }
}
