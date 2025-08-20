function openMobileMenu() {
    cy.get('[data-testid="open-mobile-menu"]').click();
    cy.get('[data-testid="mobile-drawer"]').should("be.visible");
}

function closeByEsc() {
    cy.get("body").type("{esc}");
    cy.get('[data-testid="mobile-drawer"]').should("not.be.visible");
}

function closeByBackdrop() {
    cy.get('[data-testid="mobile-drawer"]').then(($overlay) => {
        const panel = $overlay.find('div[role="dialog"]')[0];
        const w = panel.getBoundingClientRect().width;
        cy.wrap($overlay).click(w + 10, 10);
    });
    cy.get('[data-testid="mobile-drawer"]').should("not.be.visible");
}

describe("Mobile menu", () => {
    beforeEach(() => {
        cy.viewport("iphone-6");
        cy.visit("/");
        cy.get('[data-testid="mobile-drawer"]').should("not.be.visible");
    });
    
    it("closes with ESC", () => {
        openMobileMenu();
        closeByEsc();
    });

    it("closes with backdrop click", () => {
        openMobileMenu();
        closeByBackdrop();
    });
});
