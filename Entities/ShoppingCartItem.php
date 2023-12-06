<?php

namespace Entities;

class ShoppingCartItem
{
    private int $cartItemId;
    private ShoppingCart $cart;
    private Product $product;
    private int $quantity;
    private float $price;

    public function getCartItemId(): int
    {
        return $this->cartItemId;
    }

    public function setCartItemId(int $cartItemId): void
    {
        $this->cartItemId = $cartItemId;
    }

    public function getCart(): ShoppingCart
    {
        return $this->cart;
    }

    public function setCart(ShoppingCart $cart): void
    {
        $this->cart = $cart;
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function setProduct(Product $product): void
    {
        $this->product = $product;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

}