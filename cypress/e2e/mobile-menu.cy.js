function openMobileMenu() {
    cy.get('[data-testid="open-mobile-menu"]').click();
    cy.get('[data-testid="mobile-drawer"]').should("be.visible");
}

function closeByEsc() {
    cy.get("body").type("{esc}");
    cy.get('[data-testid="mobile-drawer"]').should("not.be.visible");
}

function closeByBackdrop() {
    cy.get('[data-testid="mobile-backdrop"]')
        .should("be.visible")
        .click("topRight", { force: true });
    cy.get('[data-testid="mobile-drawer"]').should("not.be.visible");
}

describe("Mobile menu", () => {
    beforeEach(() => {
        cy.viewport("iphone-6");
        cy.visit("/");
        cy.get('[data-testid="mobile-drawer"]').should("not.be.visible");
    });

    it("does not close when clicking inside the panel", () => {
        openMobileMenu();
        cy.get('[data-testid="mobile-drawer"]').click("center", { force: true });
        cy.get('[data-testid="mobile-drawer"]').should("be.visible");
    });

    it("closes with ESC", () => {
        openMobileMenu();
        closeByEsc();
    });

    it("closes with backdrop click", () => {
        openMobileMenu();
        closeByBackdrop();
    })
});
