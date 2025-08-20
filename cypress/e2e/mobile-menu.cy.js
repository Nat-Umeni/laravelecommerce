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
        .click("topRight", { force: true });
    cy.get('[data-testid="mobile-drawer"]').should("not.be.visible");
}

beforeEach(() => {
    cy.viewport("iphone-6");
    cy.visit("/");
    cy.get('[data-testid="mobile-drawer"]').should("not.be.visible");
});

it('doesnt close if you click the mobile panel itself', () => {
    openMobileMenu();
    cy.get('[data-testid="mobile-drawer"]').click();
    cy.get('[data-testid="mobile-drawer"]').should("be.visible");    
});

it("closes with ESC", () => {
    openMobileMenu();
    closeByEsc();
});

it("closes with backdrop click", () => {
    openMobileMenu();
    closeByBackdrop();
});