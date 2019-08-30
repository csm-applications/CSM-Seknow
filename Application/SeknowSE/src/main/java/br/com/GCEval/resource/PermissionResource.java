package br.com.GCEval.resource;

import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import br.com.GCEval.model.Permission;
import br.com.GCEval.repository.PermissionRepository;

@RestController
@RequestMapping("/permissions")
public class PermissionResource {
	
	
	@Autowired
	private PermissionRepository permissionRepository;
	
	@GetMapping
	public List<Permission> findAll() {
		return permissionRepository.findAll();
	}
	
	@GetMapping("/{id}")
	public Optional<Permission> findById(@PathVariable Integer id) {
		
		Optional<Permission> permissions = permissionRepository.findById(id);
		return permissions;
		
	}
	


}
