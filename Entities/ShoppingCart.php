<?php

namespace Entities;

class ShoppingCart
{
    private int $cartId;
    private User $user;
    private array $cartItems;

    public function getCartId(): int
    {
        return $this->cartId;
    }

    public function setCartId(int $cartId): void
    {
        $this->cartId = $cartId;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    public function getCartItems(): array
    {
        return $this->cartItems;
    }

    public function setCartItems(array $cartItems): void
    {
        $this->cartItems = $cartItems;
    }

}