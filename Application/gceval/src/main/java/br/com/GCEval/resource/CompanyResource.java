package br.com.GCEval.resource;

import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import br.com.GCEval.model.Company;
import br.com.GCEval.model.Useraccount;
import br.com.GCEval.repository.CompanyRepository;
import javax.validation.Valid;
import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.ResponseBody;

@RestController
@RequestMapping("/companies")
public class CompanyResource {

    @Autowired
    private CompanyRepository companyRepository;

    @GetMapping
    public List<Company> findAll() {
        return companyRepository.findAll();
    }

    @GetMapping("/{id}")
    public Optional<Company> findById(@PathVariable Integer id) {

        Optional<Company> company = companyRepository.findById(id);
        return company;

    }
    
    @GetMapping("/employees/{id}")
    public List<Useraccount> findEmployeesByIdCompany(@PathVariable Integer id) {

        Optional<Company> company = companyRepository.findById(id);
        
        return company.get().getEmployees();

    }
    
    @GetMapping("/fromuser/{id}")
    public List<Company> findCompaniesFromUser(@PathVariable Integer id) {
        
        Useraccount uc = new Useraccount();
        uc.setIdUserAccount(id);
        List<Company> companies = companyRepository.findByOwner(uc);
        return companies;

    }

    @PostMapping
    public Company create(@Valid @RequestBody Company c) {
        Company toReturn = companyRepository.save(c);
        return toReturn;
    }
    
    @PutMapping
    public Company update(@Valid @RequestBody Company c) {
        System.out.println(c);
        Company toReturn = companyRepository.save(c);
        return toReturn;
    }

    @DeleteMapping("/{id}")
    public @ResponseBody void deleteById(@PathVariable Integer id) {
        Company c = new Company();
        c.setIdCompany(id);
        companyRepository.delete(c);
    }
}
